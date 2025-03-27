<?php
if (isset($_GET["page"])) {
    $page = filter_input(INPUT_GET, "page", FILTER_SANITIZE_SPECIAL_CHARS);
    
    function deleteHits($page) {
        $file = "hits/{$page}-hits.txt";
        if (file_exists($file)) {
            file_put_contents($file, "0"); 
        }
    }

    deleteHits($page);

    echo json_encode(["success" => true, "newCount" => 0]);
}
?>