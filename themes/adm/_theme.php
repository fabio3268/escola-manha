<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= url("assets/adm/styles.css"); ?>">
    <title>Área Administrativa - Escola</title>
</head>
<body>
<div class="wrapper">
    <nav class="navbar">
        <span class="logo">Escola</span>
    </nav>
    <aside class="sidebar">
        <ul class="menu">
            <li class="menu-item">Dashboard</li>
            <li class="menu-item has-submenu">Alunos
                <ul class="submenu">
                    <li class="submenu-item">Ver Alunos</li>
                    <li class="submenu-item">Adicionar Aluno</li>
                </ul>
            </li>
            <li class="menu-item">Professores</li>
            <li class="menu-item">Cursos</li>
            <li class="menu-item">Configurações</li>
        </ul>
    </aside>
    <main class="content">
        <?php
          echo $this->section("content");
        ?>
    </main>
</div>
<script src="<?= url("assets/adm/script.js"); ?> "></script>
</body>
</html>

