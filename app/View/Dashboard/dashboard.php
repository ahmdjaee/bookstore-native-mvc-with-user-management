<?php include __DIR__ . './../navbar.php' ?>
<?php include __DIR__ . './modal.php' ?>

<div class="content z-0">
    <header class="d-flex w-100 justify-content-between position-sticky top-0 z-1 py-3 rounded-bottom bg-white">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?= $_GET['search'] ?? null ?>" aria-label="Search">
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <div class="category">
            <button class="category__tab">All</button>
            <button class="category__tab">Jewelry</button>
            <button class="category__tab">Electronics</button>
        </div>
    </header>
    <div class="cards" id="openModal">
        <?php foreach ($model['books'] as $book) : ?>
            <div class="card">
                <img src="https://www.junkybooks.com/administrator/bookimages/6483a9c6a2dfc2.47929231.jpg" class="card__image" alt="">
                <div class="card__item">
                    <span><b><?= $book->name ?></b></span>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>