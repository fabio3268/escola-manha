<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= url("assets/app/styles.css"); ?>">
    <title>Área de Aplicação</title>
</head>
<body>
<div class="wrapper">
    <nav class="navbar">
        <span class="logo">Escola</span>
    </nav>
    <aside class="sidebar">
        <ul class="menu">
            <li class="menu-item">Perfil</li>
            <li class="menu-item">Matricular</li>
            <li class="menu-item">Ver Cursos</li>
            <li class="menu-item">Ver Turmas</li>
        </ul>
    </aside>
    <main class="content">
        <?php
            echo $this->section("content");
        ?>
    </main>
</div>
<script src="application-script.js"></script>
</body>
</html>
