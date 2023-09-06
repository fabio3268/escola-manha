<h1>Login com API</h1>
<div>
    <form id="formLogin">
        <div>E-mail: <input type="text" id="email" name="email" value="fabiosantos@ifsul.edu.br"></div>
        <div>Password: <input type="text" id="password" name="password" value="12345678"></div>
        <button type="submit">Login</button>
    </form>
</div>
<div>
    <button id="listAddress">Lista De Endereços</button>
</div>
<div id="address">
    Lista
</div>
<script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";
    const formLogin = document.querySelector("#formLogin");
    formLogin.addEventListener("submit", (event) => {
        event.preventDefault();
        const urlLogin = "<?= url("api/user/login"); ?>";
        const options = {
            method : "get",
            headers : {
                email : document.querySelector("#email").value,
                password : document.querySelector("#password").value
            }
        };
        fetch(urlLogin,options).then(response => {
            response.json().then(user => {
                localStorage.setItem("userLogin",JSON.stringify(user));
            });
        });
    });

    document.querySelector("#listAddress").addEventListener("click",() => {
        const userLogin = JSON.parse(localStorage.getItem("userLogin"));
        console.log(userLogin.user.token);
        const optionsAddress = {
            method: "get",
            headers: {
                token : userLogin.user.token
            }
        };
        const urlAddress = "<?= url("api/user/adresses"); ?>";
        fetch(urlAddress,optionsAddress).then(response => {
            response.json().then(address => {
                console.log(address);
            })
        })
    });

</script>
