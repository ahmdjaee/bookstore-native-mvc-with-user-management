<main style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: auto;" >
    <?php if (isset($model['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $model['error'] ?>
        </div>
    <?php endif; ?>
    <div class="card text-center " style="width: 70vw; height: 70vh">
        <header class="d-flex justify-content-between card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Books List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="author">Author</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?= $_GET['search'] ?? null ?>" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </header>
        <div class="card-body overflow-y-scroll">
            <table class="table">
                <thead class="text-start">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Release Date</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-start">
                    <?php if (isset($model['books'])) : ?>
                        <?php foreach ($model['books'] as $key => $book) : ?>
                            <tr>
                                <th scope="row" class="text-center"><?= $key + 1 ?></th>
                                <td><?= $book->name ?></td>
                                <td><?= $book->genre ?></td>
                                <td><?= $book->releaseDate ?></td>
                                <td><?= $book->author ?></td>
                                <td>
                                    <form method="get" action="add-book" style="display:inline;">
                                        <input type="hidden" name="bookId" value="<?= $book->bookId ?>">
                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></button>
                                    </form>
                                    <form method="get" action="remove" style="display:inline;">
                                        <input type="hidden" name="bookId" value="<?= $book->bookId ?>">
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
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
        <div class="card-footer bg-header d-flex justify-content-end">
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