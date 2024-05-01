<?php include __DIR__ . './../navbar.php' ?>

<link rel="stylesheet" href="style/home/home.css">


<div class="d-flex mt-5 gap-3" style="margin-inline: 10%;">
    <aside>
        <div class="card" style="height: 80vh; width: 250px;"></div>
    </aside>

    <section class="w-100">
        <div class="books-grid">
            <?php foreach ($model['books'] as $book) : ?>
                <div onclick="location.href='/detail/1'" class="d-flex bg-white border" style="width: auto; cursor: pointer">
                    <img style="height: 250px; object-fit: cover" src="https://marketplace.canva.com/EAFFDGFkcdM/1/0/1003w/canva-hijau-biru-sederhana-ruang-sunyi-sampul-buku-novel-K3WxwPzlPyk.jpg" class="card-img" alt="...">
                    <div class="p-2">
                        <h5 class="card-title text-truncate my-2" style="font-weight: 600;"><?= $book->name ?></h5>
                        <p style="font-size: smaller;"><?= $book->synopsis ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</div>