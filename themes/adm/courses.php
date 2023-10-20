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

<!-- Modal para editar Cursos -->
<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Curso</h2>
        <form id="edit-form">
            <input type="hidden" id="id" name="id">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
            <label for="category_id">Categoria:</label>
            <select id="category_id" name="category_id">
                <option value="">Selecione uma Categoria</option>

                <?php
                foreach ($categories as $category) {
                    echo "<option value='{$category->id}'>{$category->name}</option>";
                }
                ?>

            </select>
            <label for="price">Preço:</label>
            <input type="text" id="price" name="price">
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

<script type="text/javascript">

    const tableCourses = document.querySelector("table");
    // Seletor para a modal
    const modal = document.querySelector("#edit-modal");
    // Seletor para o botão de fechar a modal
    const closeModalButton = document.querySelector(".close");

    // Função para abrir a modal com dados do produto (vai receber por parâmetro o id do produto)
    function openModal() {
        modal.style.display = "block";
    }

    // Fechar a modal ao clicar no botão de fechar
    closeModalButton.onclick = function() {
        modal.style.display = "none";
    };

    // Fechar a modal quando o usuário clicar fora dela
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    // Função para carregar os dados do produto na modal

    tableCourses.addEventListener("click", (event) => {

        if(event.target.tagName === "TD"){
            console.log(`Mostrar: ${event.target.parentNode.getAttribute("data-id")}`);
            // Requisição para getCourse

            openModal();
        }

        if(event.target.tagName === "BUTTON"){
            console.log(`Apagar: ${event.target.parentNode.parentNode.getAttribute("data-id")}`);
            //event.target.parentNode.parentNode.remove();
        }
    });

    const selectCategory = document.querySelector("#category");
    selectCategory.addEventListener("change",  async () => {
        const url = "<?= url("api/courses/category/"); ?>" + selectCategory.value;
        const response = await fetch(url, {
            method : "get"
        });
        const courses = await response.json();
        const listCourses = document.querySelector("#courseList");
        listCourses.innerHTML = "";
        courses.forEach((course) => {
            const tr = document.createElement("tr");
            tr.setAttribute("data-id", course.id);
            tr.innerHTML = `<td>${course.id}</td><td>${course.name}</td><td>R$ ${course.price}</td><td><button>X</button></td>`;
            listCourses.appendChild(tr);
        });
    });

    // Edição de Cursos
    const editForm = document.querySelector("#edit-form");
    editForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const urlUpdate = "<?= url("api/courses/"); ?>" + editForm.id.value;
    });

</script>
