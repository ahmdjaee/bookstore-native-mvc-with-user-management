<?php include __DIR__ . './../navbar.php' ?>

<link rel="stylesheet" href="style/home/home.css">

<section class="header-wrapper">
    <div class="header-content d-flex align-items-center">
        <img src="https://cdn1.katadata.co.id/media/images/thumb/2022/09/23/Sinopsis_Novel_Garis_Waktu-2022_09_23-11_09_48_a9fc1cba5b52ca2db3ac7fb3ee164264_960x640_thumb.jpg" height="80%" width="40%" class="object-fit-cover" alt="">
        <div class="text-white d-flex flex-column justify-content-center px-5" style="height: 80%; ">
            <h1 class="text-truncate">Lorem ipsum dolor sit amet.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas labore quidem repellendus perferendis possimus exercitationem a, fuga at quam sequi?</p>
        </div>
    </div>
</section>

<section class="latest-version">
    <h2 class="text-start">Latest Version</h2>
    <div class="d-flex gap-3 ">
        <?php for ($i = 0; $i < 3; $i++) : ?>
            <div class="card" style="width: 16rem;">
                <img src="https://placehold.co/600x400">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title .</p>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</section>

<section class="best-seller">
    <h2>Best Seller</h2>
    <div class="books-grid">
        <?php include __DIR__ . './../Components/CardBooks.php' ?>
    </div>
</section>

<footer class="text-center bg-dark mt-3">
    <div class="container pt-4">
        <section class="mb-4">
            <!-- Facebook -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>
            <!-- Twitter -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>
            <!-- Google -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>
            <!-- Instagram -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>
            <!-- Linkedin -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
            <!-- Github -->
            <a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-white m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
        </section>
    </div>
    <div class="text-center p-3 text-white">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
</footer>