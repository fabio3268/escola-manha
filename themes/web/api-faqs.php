<h2>Olá, FAQS</h2>

<button>Faqs</button>

<div id="divFaqs">
</div>

<script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";

    const url = "<?php echo url("/api/faqs"); ?>";
    const options = {
        method: "GET"
    };

    const getFaqs = async () => {
        const faqs = await request(url, options);
        console.log(faqs);
    };

    getFaqs();

    /*const button = document.querySelector("button");
    button.addEventListener("click", async () => {
        const faqs = await request(url, options);
        console.log(faqs);
        faqs.forEach((faq) => {
            console.log(faq);
            document.querySelector("#divFaqs").insertAdjacentHTML("beforeend", `<p>${faq.question} ${faq.answer}</p>`);
        });
    });*/
</script>
