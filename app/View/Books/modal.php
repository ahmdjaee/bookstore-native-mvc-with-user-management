<div id="modal" class="custom-modal">
    <?php if (isset($model['success'])) : ?>
        <div class="alert alert-success text-center position-fixed bottom-0 start-50 translate-middle-x" role="alert" style="min-width: 70vw;">
            <?= $model['success'] ?>
        </div>
    <?php endif; ?>
    <?php if (isset($model['error'])) : ?>
        <div class="alert alert-danger text-center position-fixed bottom-0 start-50 translate-middle-x" role="alert" style="min-width: 70vw;">
            <?= $model['error'] ?>
        </div>
    <?php endif; ?>
    <div class="card" style="width: 50vw; height: 90vh; overflow-y: scroll">
        <div class="card-body">
            <form method="post" id="formBook">
                <fieldset>
                    <div class="d-flex justify-content-between">
                        <legend>Insert Data Below </legend>
                        <i class="fa-solid fa-xmark" id="closeModal"></i>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?= $_POST['name'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Synopsis</label>
                        <textarea class="form-control" id="synopsis" name="synopsis" value="<?= $_POST['synopsis'] ?? '' ?>" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Cover</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" name="genre" id="genre" aria-label="Default select example">
                            <option selected value="<?= $_POST['genre'] ?? '' ?>">Genre</option>
                            <option value="Action">Action</option>
                            <option value="Romance">Romance</option>
                            <option value="Drama">Drama</option>
                            <option value="Sains">Sains</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="releaseDate" class="form-label">Release Date</label>
                        <input type="date" id="releaseDate" name="releaseDate" class="form-control" placeholder="Release Date" value="<?= $_POST['releaseDate'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Author</label>
                        <select class="form-select" name="authorId" id="authorId" aria-label="Default select example">
                            <option selected value="<?= $_POST['authorId'] ?? '' ?>">Author</option>
                            <?php foreach ($model['authors'] as $author) : ?>
                                <option value="<?= $author->id ?>"><?= $author->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pages" class="form-label">Total Pages</label>
                        <input type="number" id="pages" name="pages" class="form-control" placeholder="Pages" value="<?= $_POST['pages'] ?? '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>