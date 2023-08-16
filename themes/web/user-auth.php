<form>
    <div>
        E-mail: <input name="email" type="text">
    </div>
    <div>
        Senha: <input name="password" type="text">
    </div>
    <div>
        <button>Enviar</button>
    </div>
    <div class="response">

    </div>
</form>

<script type="text/javascript" async>
    //http://localhost/escola-manha/api/user/login
    const url = `<?= url("api/user/login");?>`;

    document.querySelector("form").addEventListener("submit", async (e) => {
        e.preventDefault();
        const formData = new FormData(document.querySelector("form"));
        const options = {
            method: 'GET',
            body : formData
        };
        const resp = await request(url, options);
        console.log(resp);
    });

</script>
