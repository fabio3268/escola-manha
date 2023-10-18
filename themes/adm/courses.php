<?php
    $this->layout("_theme");
?>
<h1>Sou o conteúdo do Cursos</h1>
<div class="container">
    <h1>Lista de Cursos</h1>
    <div class="filter">
        <label for="category">Categoria:</label>
        <select id="category">
            <option value="">Selecione Categoria</option>
            <?php
                foreach ($categories as $category) {
                    echo "<option value='{$category->id}'>{$category->name}</option>";
                }
            ?>
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
        </tbody>
    </table>
</div>
<script type="text/javascript">
    const selectCategory = document.querySelector("#category");
    selectCategory.addEventListener("change",  async () => {
        console.log(selectCategory.value);
        const url = "<?= url("api/courses/category/"); ?>" + selectCategory.value;
        const response = await fetch(url, {
            method : "get"
        });
        const courses = await response.json();
        console.log(courses);
        const listCourses = document.querySelector("#courseList");
        listCourses.innerHTML = "";
        courses.forEach((course) => {
            console.log(course.name);
            const tr = document.createElement("tr");
            tr.innerHTML = `<td>${course.id}</td><td>${course.name}</td><td>R$ ${course.price}</td><td><button>X</button></td>`;
            listCourses.appendChild(tr);
        });
    });
</script>
