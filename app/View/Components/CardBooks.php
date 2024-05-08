<?php if (isset($model['books'])) : ?>
    <?php foreach ($model['books'] as $book) : ?>
        <div onclick="location.href='/detail/1'" class="d-flex bg-white border" style="width: auto; cursor: pointer">
            <img style="max-height: 250px; max-width: 160px; object-fit: cover" src=<?= $book->image ?> class="card-img" alt="...">
            <div class="books-content p-2">
                <h5 class="card-title text-truncate my-2" style="font-weight: 600;"><?= $book->name ?></h5>
                <p style="font-size: smaller;"><?= $book->synopsis ?></p>
                <pre style="font-weight: 600; font-size: smaller;"><?= "Rp. " . $book->price ?></pre>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <img src="<?= BASE_URL . '/assets/image/image.png' ?>" alt="">
<?php endif; ?>