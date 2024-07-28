<!-- cart_view.php -->
<?= $this->include('layouts/header') ?>

<div class="container mt-4">
    <h1>Your Cart</h1>

    <?php if (!empty($cartItems) && is_array($cartItems)) : ?>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item) : ?>
                    <tr>
                        <td><img src="<?= base_url('uploads/' . esc($item['image_url'])) ?>" alt="<?= esc($item['name']) ?>" class="img-thumbnail" style="width: 100px;"></td>
                        <td><?= esc($item['name']) ?></td>
                        <td><?= esc($item['description']) ?></td>
                        <td>$<?= esc($item['price']) ?></td>
                        <td>
                            <form action="<?= base_url('cart/update/' . esc($item['id'])) ?>" method="post">
                                <input type="number" name="quantity" value="<?= esc($item['quantity']) ?>" min="1">
                                <button type="submit" class="btn btn-secondary">Update</button>
                            </form>
                        </td>
                        <td>$<?= esc($item['total']) ?></td>
                        <td>
                            <a href="<?= base_url('cart/remove/' . esc($item['id'])) ?>" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= base_url('checkout') ?>" class="btn btn-primary">Proceed to Checkout</a>
    <?php else : ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>
</div>

<?= $this->include('layouts/footer') ?>