<?php
session_start();

require 'includes/header.php';

include 'helpers/counter.php';
hitsCount("home");
hitsLogs("home");
?>

<link href="style/container.css" rel="stylesheet">

<style>
    .main-container{
        background-color: rgb(216, 255, 216);
        border: 4px solid green;
    }

    .alert-custom {
        width: 90vw;
        margin: auto;
    }
</style>

<?php
if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){
?>
    <div class="alert alert-warning alert-custom" role="alert">
        <?=$_SESSION["error"]?>
    </div>
<?php
    unset($_SESSION["error"]);
}
?>


<main class="main-container">

    <h1>Página Inicial</h1>
    <hr>

    <div class="content-container">
        <img src="images/home-icon.png" alt="Logo de uma casa representando a página inicial" class="side-img">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos ducimus eligendi sint iure, aut voluptatem suscipit autem, ipsum consequuntur nam error! Consequatur molestias dolor ut, qui doloribus minima deleniti aspernatur.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure animi, exercitationem enim tenetur culpa dolorem ipsum reprehenderit iste laboriosam deleniti obcaecati esse velit magni harum consectetur quis, eaque neque ad, ab maiores eveniet! Voluptas esse sequi tenetur nulla obcaecati saepe.</p>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia dignissimos repudiandae molestias tempore asperiores quae dicta laboriosam neque fuga quasi? Consequuntur illo commodi nihil consectetur provident vitae ducimus vero repellendus deserunt cum. Itaque laborum adipisci necessitatibus quia, ut nostrum at possimus sequi ex iusto eaque accusamus odio obcaecati fugiat recusandae pariatur numquam, illo, excepturi temporibus?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos ducimus eligendi sint iure, aut voluptatem suscipit autem, ipsum consequuntur nam error! Consequatur molestias dolor ut, qui doloribus minima deleniti aspernatur.</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa, quia debitis laborum molestias quisquam error adipisci deserunt nisi distinctio minus obcaecati illum quo, dolore aperiam voluptatum velit hic inventore ad blanditiis ex odio maxime, dolorum consequuntur soluta! Inventore tenetur rem commodi impedit facilis qui veritatis aliquid nulla molestias, quis pariatur illo quas velit maxime ab.</p>
        <div class="clear"></div>
    </div>
</main>

<?php
require 'includes/footer.php';
?>
