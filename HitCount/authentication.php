<?php
session_start();

if(isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
    $_SESSION["error"] = "Usuário já está autenticado";
    header("Location: index.php");
}

require 'includes/header.php';
?>

<link href="style/container.css" rel="stylesheet">

<style>
    .row-custom {
        display: flex;
        justify-content: center;
    }

    .caption {
        text-align: center;
    }

    .main-container {
        background-color: rgb(255, 195, 195);
        border: 3px solid red;
        margin-top:0;
    }

    .alert {
        background-color: white;
        border: 2px solid red;
        color: red;
        width: 30vw;
        text-align: center;
        margin: 20px auto 0 auto;
    }
</style>

<div class="main-container">
    <h1>Logs de Acesso</h1>
    <hr>
    <h2 class="caption">Acess Key</h2>
    <hr>
    <form action="authentication.php" method="POST">  
        <div class="row row-custom">
            <div class="col-2">
                <input type="text" class="form-control" aria-describedby="basic-addon1" id="key" name="key" required placeholder="Key">
            </div>
            <div class="col-1">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

        <?php
            $key = filter_input(INPUT_POST, "key", FILTER_SANITIZE_SPECIAL_CHARS);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if($key == "senha_da_nasa") {
                    $_SESSION["user"] = $key;
                    header("Location: index.php");
                } else {
                    echo "<p class='alert'>Chave incorreta!</p>";
                }
            }
            ?>
    </form>
</div>

<?php
require 'includes/footer.php';
?>