<?php include __DIR__ . './../sidebar.php' ?>
<?php include __DIR__ . './modal.php' ?>

<main id="container" class="d-flex flex-column align-items-center" style="margin-left: 250px; transition: 0.5s; height: 100%">
    <?php if (isset($model['error'])) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $model['error'] ?>
        </div>
    <?php endif; ?>
    <div class="card p-3 pt-2 text-center border-0 " style="width: 95%; height: min-content; <?php echo (!isset($model['error']))  ? 'top: 24px;' : 'top: 0px;' ?> box-shadow: 0 0 4px 0 var(--shadow);">
        <header class=" w-100 d-flex justify-content-between p-3 ">
            <h5 class="co--primary"><b>Books</b></h5>
            <ul class="nav nav-pills card-header-pills d-flex gap-3">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" id="openModal"> <i class="fa-solid fa-plus"></i></button>
                </li>
                <li>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?= $_GET['search'] ?? null ?>" aria-label="Search">
                    </form>
                </li>
            </ul>
        </header>
        <div class="card-body p-0 " style="min-height: 75vh;">
            <table class="table">
                <thead class="text-start position-sticky top-0">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Synopsis</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Author Id</th>
                        <th scope="col">Pages</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-start">
                    <?php if (isset($model['books'])) : ?>
                        <?php foreach ($model['books'] as $key => $book) : ?>
                            <tr valign="middle">
                                <td><?= $book->name ?></td>
                                <td scope="row"><img class="rounded-1" src="https://marketplace.canva.com/EAFFDGFkcdM/1/0/1003w/canva-hijau-biru-sederhana-ruang-sunyi-sampul-buku-novel-K3WxwPzlPyk.jpg" style="width: 50px; height: 50px;"></td>
                                <td class="text-truncate" style="max-width: 220px; max-lines: 2;"><?= $book->synopsis ?></td>
                                <td><?= $book->genre ?></td>
                                <td><?= $book->releaseDate ?></td>
                                <td><?= $book->authorId ?></td>
                                <td><?= $book->pages ?></td>
                                <td>
                                    <button type="button" id="bookId" onclick="showModal(<?= $book->id ?>)" class="btn btn-sm"><i class="fas fa-pencil-alt co--primary"></i></button>
                                    <form action="/books/<?= $book->id ?>/delete" style="display:inline;">
                                        <button class="btn btn-sm"><i class="fa-solid fa-trash co--danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td colspan="6" rowspan="4" style="text-align: center;">
                            <span><?= $model['booksError'] ?? null ?></span>
                        </td>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-2 bg-white d-flex justify-content-end">
            <ul class="pagination m-0">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </div>
    </div>
</main>

<script src="js/books/books.js"></script>