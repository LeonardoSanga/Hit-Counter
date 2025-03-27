<?php

ob_start();
session_start();

if(!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
    $_SESSION["error"] = "Você está tentando acessar conteúdo restrito!";
    header("Location: index.php");
}

require 'includes/header.php';
include 'helpers/counter.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="style/container.css" rel="stylesheet">

<style>
    .main-container {
        background-color: rgb(255, 195, 195);
        border: 3px solid red;
    }

    .cont {
        display: flex;
    }

    .subCont {
        width: 70vw;
    }

    .hits-counter {
        display: flex;
        justify-content: space-around;
    }

    .hitsSquare-container {
        font-weight: bolder;
        font-size: 1.5em;
        padding: 15px 80px;
        margin-bottom: 20px;
        width: 300px;
        justify-content: center;
        align-items: center; 
        text-align: center; 
    }

    .btn-container {
        text-align: center;
        margin:  20px 0;;
    }

    img {
        height: 500px
    }

    .hitsLogs-container {
        font-size: 1.3em;

    }

    .hitsLogs-container p {
        padding-left: 25%;
    }

</style>

<?php

$clearAll = filter_input(INPUT_GET, "clear-all", FILTER_SANITIZE_SPECIAL_CHARS);

if(isset($clearAll) && !empty($clearAll)) {
    deleteAllHits();
    
}

$pages = [
    "home" => getHits("home"),
    "about" => getHits("about"),
    "contact" => getHits("contact"),
];

arsort($pages);
?>

<div class="main-container">
    <h1>Logs de Acesso</h1>
    <hr>
    <div class="cont">
        <div class="subCont">
            <div class="hits-counter">
                <?php foreach ($pages as $page => $hits): ?>
                    <div class="hitsSquare-container border border-primary bg-white">
                        <?php
                        $clearParam = "clear-{$page}";
                        $clear = filter_input(INPUT_GET, $clearParam, FILTER_SANITIZE_SPECIAL_CHARS);

                        if (isset($clear) && !empty($clear)) {
                            deleteHits($page);

                            redirect();
                        }

                        $icons = [
                            "home" => "fas fa-home",
                            "about" => "fa fa-info-circle",
                            "contact" => "fa fa-envelope",
                        ];

                        ?>
                        <p class="text-primary"><i class="<?php echo $icons[$page]; ?>"></i> <?php if($page == "home") { $pageName = "Início";} else if ($page == "about") { $pageName = "Sobre";} else {$pageName = "Contato";} echo ucfirst($pageName); ?></p>
                        <p><strong><span class="homeHits-count"><?php echo $hits; ?> Acessos</span></strong></p>
                        <a onclick="return confirm('Tem certeza que deseja limpar os acessos desta página?')" href="<?php echo $_SERVER['PHP_SELF']; ?>?<?php echo $clearParam; ?>=true" class="btn btn-outline-primary" id="<?php echo $clearParam; ?>" name="<?php echo $clearParam; ?>" >Limpar</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="text-center"><i class="fas fa-stopwatch"></i> Total de Acessos: <?php echo getTotalHits(); ?><span class="blue-highlight"></span></h2>
            <div class="btn-container"><a onclick="return confirm('Tem certeza que deseja limpar os acessos de todas as páginas?')" href="<?php echo $_SERVER['PHP_SELF']; ?>?clear-all=true" class="btn btn-danger btn-custom"  id="clear-all" name="clear-all"><i class="fas fa-trash-alt"></i> Limpar todos os acessos</a></div>
            <?php
            if (isset($_SESSION["success"])) {
                echo "<p id='success-message'>{$_SESSION['success']}</p>";
                unset($_SESSION["success"]); 
            }
            ?>
            <hr>
            <?php
            $clearLogs = filter_input(INPUT_GET, "clear-logs", FILTER_SANITIZE_SPECIAL_CHARS);

            if (isset($clearLogs) && !empty($clearLogs)) {
                deleteLogs();
                redirect();
            }
            ?>

            <div class="hitsLogs-container">
                <?php
                    $lines = readLogs();

                    if (!empty($lines)) {
                        foreach ($lines as $line) {
                            
                            echo "<p>$line</p>";
                            
                        }
                    }
                ?>
            </div>
            <div class="btn-container"><a  onclick="return confirm('Tem certeza que deseja limpar os registros de acessos das páginas?')" href="<?php echo $_SERVER['PHP_SELF']; ?>?clear-logs=true" class="btn btn-danger btn-custom" id="clear-logs" name="clear-logs"><i class="fas fa-trash-alt"></i> Limpar Log</a></div>
        </div>
        <img src="images/log-icon.png" alt="Ícone de um registro" class="side-img">
    </div>
</div>

<script>
    setTimeout(function() {
        var message = document.getElementById("success-message");
        if (message) {
            message.style.transition = "opacity 1s";
            message.style.opacity = "0";
            setTimeout(() => message.remove(), 1000); 
        }
    }, 3000); 
</script>

<?php
ob_end_flush(); 

require 'includes/footer.php';
?>