<?php include __DIR__ . './../navbar.php' ?>

<div class="d-flex mt-5 gap-3" style="margin-inline: 10%;">
    <aside>
        <div class="card" style="height: 80vh; width: 250px;"></div>
    </aside>

    <section class="w-100">
        <h2>Best Seller</h2>
        <div style="margin-inline: auto; display: grid; grid-template-columns: repeat(auto-fill, minmax(24rem, 24rem)); grid-gap: 10px; cursor: pointer">
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <div class="d-flex bg-white">
                    <img style="height: 200px; object-fit: cover" src="https://marketplace.canva.com/EAFFDGFkcdM/1/0/1003w/canva-hijau-biru-sederhana-ruang-sunyi-sampul-buku-novel-K3WxwPzlPyk.jpg" class="card-img" alt="...">
                    <div class="p-2">
                        <h5 class="card-title">Card title</h5>
                        <p style="font-size: smaller;">Di Barcelona pasca-perang dunia kedua, seorang anak laki-laki bernama Daniel Sempere menemukan sebuah buku misterius di Cemetery of Forgotten Books</p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </section>
</div>