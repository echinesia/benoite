<?= $this->include('layouts/header') ?>

<h3>Your Cart</h3>
<?php if (empty($cart)) : ?>
    <p>Your cart is empty.</p>
<?php else : ?>
    <form action="<?= base_url('/cart/update') ?>" method="post">
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart as $item) : ?>
                    <tr>
                        <td><img src="<?= base_url('uploads/' . $item['image']) ?>" alt="<?= $item['name'] ?>" width="50"></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= number_format($item['price'], 2) ?></td>
                        <td><input type="number" name="quantities[<?= $item['id'] ?>]" value="<?= $item['quantity'] ?>" min="1"></td>
                        <td><?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        <td>
                            <a href="<?= base_url('/cart/remove/' . $item['id']) ?>" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php $total += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                    <td><strong><?= number_format($total, 2) ?></strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Update Cart</button>
    </form>
<?php endif; ?>

<a href="<?= base_url('/') ?>" class="btn btn-secondary">Continue Shopping</a>
<a href="<?= base_url('/checkout') ?>" class="btn btn-success">Proceed to Checkout</a>



<?= $this->include('layouts/footer') ?>