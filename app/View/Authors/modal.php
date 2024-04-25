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
    <div class="card" style="width: 50vw; height: min-content;">
        <div class="card-body">
            <form id="formAuthor" method="post">
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?= $_POST['email'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birth Date</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" placeholder="Release Date" value="<?= $_POST['birthdate'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label for="placeOfBirth" class="form-label">Place Of Birth</label>
                        <input type="text" id="placeOfBirth" name="placeOfBirth" class="form-control" placeholder="Place Of Birth" value="<?= $_POST['placeOfBirth'] ?? '' ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>