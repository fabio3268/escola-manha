<?php

 $this->layout("_theme",[
         "categories" => $categories
 ]);

?>

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Nossos Cursos</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">


                <?php
                foreach ($courses as $course) {
                ?>
                <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="box featured">
                    <h3><?= $course->name; ?></h3>
                    <h4><sup>R$</sup><?= moneyFormat($course->price); ?><span> / mês</span></h4>
                    <ul>
                        <li><?= $course->abstract; ?></li>
                    </ul>
                    <div class="btn-wrap">
                        <a href="#" class="btn-buy">Faça sua matrícula</a>
                    </div>
                </div>
                </div>
                <?php
                }
                ?>

        </div>

    </div>
</section><!-- End Pricing Section -->

