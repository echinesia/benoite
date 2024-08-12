<?= $this->include('layouts/header') ?>

<style>
    .catalog-header {
        text-align: center;
        margin: 2rem 0;
    }

    .catalog-header h1 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .catalog-header p {
        font-size: 1.2rem;
        color: #555;
    }

    .card {
        border: none;
        transition: transform 0.3s ease-in-out;
        background: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        border-radius: 5px 5px 0 0;
        object-fit: cover;
        height: 150px;
        /* Reduced height for a square-ish look */
        width: 100%;
        /* Ensure the width is 100% of the card */
    }

    .card-body {
        text-align: center;
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
    }

    .card-text {
        font-size: 1rem;
        color: #777;
        margin: 0.5rem 0;
    }

    .btn-success {
        background-color: #28a745;
        border: none;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }
</style>

<div class="catalog-header">
    <h1>Cake Catalog</h1>
    <p>Explore our delicious variety of homemade cakes.</p>
</div>

<div class="container">
    <div class="row mt-4">
        <?php if (!empty($cakes) && is_array($cakes)) : ?>
            <?php foreach ($cakes as $cake) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php
                        $imageUrl = base_url('uploads/' . esc($cake['image_url']));
                        ?>
                        <img src="<?= $imageUrl ?>" class="card-img-top" alt="<?= esc($cake['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($cake['name']) ?></h5>
                            <p class="card-text"><?= esc($cake['description']) ?></p>
                            <p class="card-text">$<?= esc($cake['price']) ?></p>
                            <a href="<?= base_url('cart/add/' . esc($cake['id'])) ?>" class="btn btn-success">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center">No cakes available.</p>
        <?php endif; ?>
    </div>
</div>

<?= $this->include('layouts/footer') ?>