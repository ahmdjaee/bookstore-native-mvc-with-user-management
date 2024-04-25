<?php include __DIR__ . './../navbar.php' ?>

<main>

</main>
<div class="w-100 " style="background-image: url(https://uiii.ac.id/assets/images/1636690539-alfons-morales-YLSwjSy7stw-unsplash-2.jpg); background-size: cover; background-position: center">
    <div style="height: 70vh; background-color: rgba(0, 0, 0, 0.5); padding-inline: 10%" class="d-flex justify-content-center align-items-center">
        <img src="https://cdn1.katadata.co.id/media/images/thumb/2022/09/23/Sinopsis_Novel_Garis_Waktu-2022_09_23-11_09_48_a9fc1cba5b52ca2db3ac7fb3ee164264_960x640_thumb.jpg" height="80%" width="40%" class="object-fit-cover" alt="">
        <div class="text-white d-flex flex-column justify-content-center px-5" style="height: 80%; ">
            <h1 class="text-truncate">Lorem ipsum dolor sit amet.</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas labore quidem repellendus perferendis possimus exercitationem a, fuga at quam sequi?</p>
        </div>
    </div>
</div>

<section class="d-flex justify-content-center p-3">
    <div class="">
        <h2 class="text-start">Latest Version</h2>
        <div class="d-flex gap-3" style="margin-inline: auto;">
            <?php for ($i = 0; $i < 3; $i++) : ?>
                <div class="card" style="width: 16rem;">
                    <img style="height: 250px; object-fit: cover" src="https://cdn1-production-images-kly.akamaized.net/x4wnW4y2i8tWrVqGXrNuBkMKHkk=/191x168:3111x1813/500x281/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/3573403/original/013878300_1631766119-hidup_apa_adanya.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title .</p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<section class="" style="margin-inline: 7%;">

    <h2>Best Seller</h2>
    <div style="margin-inline: auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(24rem, 24rem)); grid-gap: 10px; cursor: pointer">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <div class="d-flex bg-white">
                <img style="height: 250px; object-fit: cover" src="https://marketplace.canva.com/EAFFDGFkcdM/1/0/1003w/canva-hijau-biru-sederhana-ruang-sunyi-sampul-buku-novel-K3WxwPzlPyk.jpg" class="card-img" alt="...">
                <div class="p-2">
                    <h5 class="card-title">Card title</h5>
                    <p style="font-size: smaller;">Di Barcelona pasca-perang dunia kedua, seorang anak laki-laki bernama Daniel Sempere menemukan sebuah buku misterius di Cemetery of Forgotten Books</p>
                </div>
            </div>
        <?php endfor; ?>
    </div>

</section>


<footer class="text-center bg-dark mt-3">
    <!-- Grid container -->
    <div class="container pt-4">
        <!-- Section: Social media -->
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
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 text-white">
        © 2020 Copyright:
        <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>