<?php
function hitsCount($page) {
    $file = "hits/{$page}-hits.txt";

    if (!file_exists($file)) {
        file_put_contents($file, "0");
    }

    $count = (int) file_get_contents($file);

    $count++;
    file_put_contents($file, $count);
}

function getHits($page) {
    $file = "hits/{$page}-hits.txt";
    return file_exists($file) ? file_get_contents($file) : "0";
}

function deleteHits($page) {
    $file = "hits/{$page}-hits.txt";

    if (file_exists($file) && file_get_contents($file) != "0") {
        file_put_contents($file, "0");

        if($page == "home") {
            $pageName = "Início";
        } else if ($page == "about") {
            $pageName = "Sobre";
        } else {
            $pageName = "Contato";
        }

        $_SESSION["success"] = "Os acessos da página {$pageName} foram apagados com sucesso.";
    }
}

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getBrowser() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($user_agent, 'Chrome') !== false) {
        return "Chrome";
    } elseif (strpos($user_agent, 'Firefox') !== false) {
        return "Firefox";
    } elseif (strpos($user_agent, 'Safari') !== false && strpos($user_agent, 'Chrome') === false) {
        return "Safari";
    } elseif (strpos($user_agent, 'Edge') !== false) {
        return "Edge";
    } elseif (strpos($user_agent, 'MSIE') !== false || strpos($user_agent, 'Trident') !== false) {
        return "Internet Explorer";
    } else {
        return "Desconhecido";
    }
}

function hitsLogs($page) {
    $file = "hits/hitsLogs.txt";

    if (!file_exists($file)) {
        file_put_contents($file, "");
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (empty($lines)) {
        $count = 1;
    } else {
        $lastLine = end($lines);
        
        $parts = explode(" | ", $lastLine);
        
        $count = (int) trim($parts[0]) + 1;
    }

    if($page == "home") {
        $pageName = "Início";
    } else if ($page == "about") {
        $pageName = "Sobre";
    } else {
        $pageName = "Contato";
    }

    $data = $count . " | " . $pageName . " | " . date("Y-m-d H:i:s") . " | " . getUserIP() . " | " . getBrowser();

    file_put_contents($file, $data . PHP_EOL, FILE_APPEND);
}

function readLogs() {
    $file = "hits/hitsLogs.txt";
    if (!file_exists($file)) {
        echo "Arquivo de logs não encontrado!";
        return;
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    return $lines;
}

function deleteLogs() {
    $file = "hits/hitsLogs.txt";

    if (file_exists($file) && file_get_contents($file) != "") {
        file_put_contents($file, "");
        $_SESSION["success"] = "Os registros de acesso foram apagados com sucesso.";
    }
}

function getTotalHits() {
    return file_get_contents("hits/home-hits.txt") + file_get_contents("hits/about-hits.txt") + file_get_contents("hits/contact-hits.txt");
}

function deleteAllHits() {
    $pages = ["home", "about", "contact"];
    $count = 0;

    foreach ($pages as $page) {
        $file = "hits/{$page}-hits.txt";


        if (file_exists($file) && file_get_contents($file) != "0") {
            $count++;
            file_put_contents($file, "0");
        } 

    }

    if ($count != 0) {
        $_SESSION["success"] = "Todos os acessos foram apagados com sucesso!";
    }
    
    
}

function redirect() {
    header("Location: ./hits-logs.php");
    exit();
}
?>