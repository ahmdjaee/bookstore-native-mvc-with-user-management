<?php include __DIR__ . './../navbar.php' ?>
<?php include __DIR__ . './../Component/modal.php' ?>

<div class="content">
    <header class="header">
        <h2 class="text--header">Product List</h2>
        <div class="category">
            <button class="category__tab">All</button>
            <button class="category__tab">Jewelry</button>
            <button class="category__tab">Electronics</button>
        </div>
    </header>
    <main class="cards">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <div class="card">
                <img src="https://picsum.photos/300/300" class="card__image" alt="">
                <div class="card__item">
                    <span><b>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae architecto</b></span>
                    <span>Lorem ipsum dolor sit amet</span>
                </div>
            </div>
        <?php endfor ?>
    </main>
    <!-- <div class="bottomNavSwitch">
        <button class="switchButton" type="button" id="previous">Previous Page</button>
        <button class="switchButton" type="button" id="next">Next Page</button>
    </div> -->
</div>