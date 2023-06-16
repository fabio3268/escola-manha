<?php
    $this->layout("_theme", ["categories" => $categories]);
?>

<section id="contact" class="contact section-bg">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6">
            <form role="form" class="php-email-form">
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="name" id="subject" placeholder="Seu nome" value="Fábio" >
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="email" id="subject" placeholder="Seu email" value="fabiosantos@ifsul.edu.br" >
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="password" id="subject" placeholder="Sua senha" value="12345678" >
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
    </div>
    </div>
    </div>
</section>

<script type="text/javascript" async>
    const form = document.querySelector(".php-email-form");

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
