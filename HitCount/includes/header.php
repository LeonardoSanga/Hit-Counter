<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Acessos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
        .navbar-custom {
            background-color: #0066ff;
            padding: 1.3em 4em;
        }

        .navbar-custom .navbar-brand-custom {
            font-size: 2em;
        }

        .navbar-custom .navbar-nav-custom {
            font-size: 1.7em;
        }

        .navbar-custom .nav-link:hover {
            color: #ffcc00; /* Cor ao passar o mouse */
        }

        .nav-item .hits-logs {
            color: rgb(119, 0, 0) !important; /* Estilo especial para Logs de Acesso */
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container-fluid">
            <a class="navbar-brand text-white navbar-brand-custom" href="#">Trabalho T1 - Leonardo | Página Inicial</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <?php 
                $pagina_atual = $_SERVER['REQUEST_URI']; 

                function isActive($pagina) {
                    global $pagina_atual;

                    return strpos($pagina_atual, $pagina) !== false ? 'text-warning fw-bold' : '';
                }
                ?>

                <?php if(!isset($_SESSION["user"])) { ?>
                <ul class="navbar-nav navbar-nav-custom">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive("index.php") ?>" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive("about.php") ?>" href="about.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive("contact.php") ?>" href="contact.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hits-logs" href="authentication.php">#Logs de Acesso</a>
                    </li>
                </ul>
                <?php } else { ?>
                <ul class="navbar-nav navbar-nav-custom">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive("index.php") ?>" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive("about.php") ?>" href="about.php">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive("contact.php") ?>" href="contact.php">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link hits-logs <?php echo isActive("hits-logs.php") ?>" href="hits-logs.php">#Logs de Acesso</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="exit.php">Sair</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>