<?= $this->include('layouts/header') ?>

<div class="text-center">
    <h1>Cake Catalog</h1>
    <p>Explore our delicious variety of homemade cakes.</p>
    <div class="container">
        <div class="row mt-4">
            <?php if (!empty($cakes) && is_array($cakes)) : ?>
                <?php foreach ($cakes as $cake) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <?php
                            $imageUrl = base_url('uploads/' . esc($cake['image_url']));
                            ?>
                            <img src="<?= $imageUrl ?>" class="card-img-top" alt="<?= esc($cake['name']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($cake['name']) ?></h5>
                                <p class="card-text"><?= esc($cake['description']) ?></p>
                                <p class="card-text">$<?= esc($cake['price']) ?></p>
                                <a href="<?= base_url('cart/add/' . esc($cake['id'])) ?>" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No cakes available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>