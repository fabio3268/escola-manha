<h1>Login com API</h1>

<div>
    <form id="formLogin">
        <div>E-mail: <input type="text" id="email" name="email" value="fabiosantos@ifsul.edu.br"></div>
        <div>Password: <input type="text" id="password" name="password" value="12345678"></div>
        <button type="submit">Login</button>
    </form>
</div>
<script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";
    const formLogin = document.querySelector("#formLogin");
    formLogin.addEventListener("submit", (event) => {
        event.preventDefault();
        console.log("oi");
        const urlLogin = "<?= url("api/user/login"); ?>";
        console.log(urlLogin);
        const options = {
            method : "get",
            headers : {
                email : document.querySelector("#email").value,
                password : document.querySelector("#password").value
            }
        };
        fetch(urlLogin,options).then(response => {
            response.json().then(user => {
                //console.log(user);
                //console.log(JSON.stringify(user));
                localStorage.setItem("userLogin",JSON.stringify(user));
            });
        });
    });
</script>
