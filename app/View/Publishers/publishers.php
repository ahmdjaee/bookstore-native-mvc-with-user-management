<?php include __DIR__ . './../sidebar.php' ?>
<?php include __DIR__ . './modal.php' ?>

<main id="container" class="d-flex flex-column align-items-center" style="margin-left: 250px; transition: 0.5s; height: 100%">
    <?php if (isset($model['error'])) : ?>
        <div class="alert alert-danger mt-3" role="alert">
            <?= $model['error'] ?>
        </div>
    <?php endif; ?>
    <div class="card p-3 pt-2 text-center border-0 " style="width: 95%; height: min-content; <?php echo (!isset($model['error']))  ? 'top: 24px;' : 'top: 0px;' ?> box-shadow: 0 0 4px 0 var(--shadow);">
        <header class=" w-100 d-flex justify-content-between py-3 ">
            <div class="p-1 rounded w-50 text-start" style="background-image: url(<?= BASE_URL . '/assets/bg-header-table.png' ?>); background-repeat: no-repeat; background-size: cover">
                <h5 class="co--primary d-inline-block bg-white py-2 px-3 m-0 rounded" style="font-weight: 600 ;">Publishers</h5>
            </div>
            <ul class="nav nav-pills card-header-pills d-flex gap-3">
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" id="openModal"> <i class="fa-solid fa-plus"></i></button>
                </li>
                <li>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?= $_GET['search'] ?? '' ?>" aria-label="Search">
                    </form>
                </li>
            </ul>
        </header>
        <div class="card-body p-0 " style="min-height: 75vh;">
            <table class="table">
                <thead class="text-start position-sticky top-0">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-start">
                    <?php if (isset($model['publishers'])) : ?>
                        <?php foreach ($model['publishers'] as $key => $publisher) : ?>
                            <tr valign="middle">
                                <td class="text-truncate"><?= $publisher->name ?></td>
                                <td class="text-truncate"><?= $publisher->address ?></td>
                                <td>
                                    <button type="button" id="bookId" onclick="showModal(<?= $publisher->id ?>)" class="btn btn-sm"><i class="fas fa-pencil-alt co--primary"></i></button>
                                    <form action="/books/<?= $publisher->id ?>/delete" style="display:inline;">
                                        <button class="btn btn-sm"><i class="fa-solid fa-trash co--danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <td colspan="6" rowspan="4" style="text-align: center;">
                            <span><?= $model['notFound'] ?? null ?></span>
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