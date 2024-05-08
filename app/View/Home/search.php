<?php include __DIR__ . './../navbar.php' ?>

<link rel="stylesheet" href="style/home/home.css">

<div class="d-flex mt-5 gap-3" style="margin-inline: 10%;">
    <aside>
        <div class="card" style="height: 80vh; width: 250px;"></div>
    </aside>

    <section class="w-100">
        <div class="books-grid">
            <?php include __DIR__ . './../Components/CardBooks.php' ?>
        </div>
    </section>
</div>