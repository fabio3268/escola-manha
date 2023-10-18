<?php
    $this->layout("_theme");
?>
<h1>Sou o conteúdo do Cursos</h1>
<div class="container">
    <h1>Lista de Cursos</h1>
    <div class="filter">
        <label for="category">Categoria:</label>
        <select id="category">
        </select>
        <label for="nameCourse">Nome do Curso:</label>
        <input type="text" id="nameCourse">
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Preço</th>
            <th>Apagar</th>
        </tr>
        </thead>
        <tbody id="courseList">
        <tr>
            <td>2</td><td>Nome do Curso</td><td>Preço</td><td><button>X</button></td>
        </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="<?= url("assets/adm/script-course.js"); ?> "></script>
