<form>
    <div>
        Nome: <input name="name" type="text">
    </div>
    <div>
        E-mail: <input name="email" type="text">
    </div>
    <div>
        Senha: <input name="password" type="text">
    </div>
    <div>
        <button>Enviar</button>
    </div>
</form>

<script type="text/javascript" async>
    const form = document.querySelector("form");

    const headers = {
        email: "fabiosantos@ifsul.edu.br",
        password: "12345678"
    };

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        //console.log(new FormData(form));
        const data = await fetch(`<?= url("api/user");?>`,{
            method: "POST",
            body: new FormData(form),
            headers: headers
        });
        const user = await data.json();
        console.log(user);
    });
</script>
