<main style="display: flex; justify-content: center; align-items: center; flex-direction: column; margin: auto;">

    <?php if (isset($model['success'])) : ?>
        <div class="alert alert-success text-center" role="alert" style="min-width: 70vw;">
            <?= $model['success'] ?>
        </div>
    <?php endif; ?>
    <?php if (isset($model['error'])) : ?>
        <div class="alert alert-danger text-center" role="alert" style="min-width: 70vw;">
            <?= $model['error'] ?>
        </div>
    <?php endif; ?>
    <div class="card" style="width: 70vw; height: 70vh">
        <div class="card-body">
            <form method="post" action="add-book">
                <fieldset>
                    <legend>Insert Data Below </legend>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?= $_POST['name'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <input type="text" id="genre" name="genre" class="form-control" placeholder="Genre" value="<?= $_POST['genre'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="releaseDate" class="form-label">Release Date</label>
                        <input type="date" id="releaseDate" name="releaseDate" class="form-control" placeholder="Release Date" value="<?= $_POST['releaseDate'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" id="author" name="author" class="form-control" placeholder="Author" value="<?= $_POST['author'] ?? '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</main>