<?= $this->include('layouts/header') ?>

<div class="text-center">
    <h1>Cake Catalog</h1>
    <p>Explore our delicious variety of homemade cakes.</p>
    <div class="row mt-4">
        <?php if (!empty($cakes) && is_array($cakes)) : ?>
            <?php foreach ($cakes as $cake) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark text-white h-100">
                        <img src="<?= base_url('uploads/' . esc($cake['image_url'])) ?>" class="card-img-top" alt="<?= esc($cake['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($cake['name']) ?></h5>
                            <p class="card-text"><?= esc($cake['description']) ?></p>
                            <p class="card-text">$<?= esc($cake['price']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No cakes available.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('layouts/footer') ?>