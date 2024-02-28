<main style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin: auto;">
    <?php if (isset($model['error'])) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $model['error'] ?>
        </div>
    <?php endif; ?>
    <div class="card text-center " style="width: 70vw; height: 70vh">
        <header class="d-flex justify-content-between card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link" href="/">Books List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Author</a>
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
                        <th scope="col">Book Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Release Book</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td colspan="5" rowspan="5">Under Development</td>
                    </tr>
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