<?= $this->include('layouts/header') ?>

<h3>Order Summary</h3>
<?php if ($order) : ?>
    <p><strong>Order ID:</strong> <?= esc($order['id']) ?></p>
    <p><strong>Name:</strong> <?= esc($order['customer_name']) ?></p>
    <p><strong>Address:</strong> <?= esc($order['address']) ?></p>
    <p><strong>Phone Number:</strong> <?= esc($order['phone_number']) ?></p>
    <p><strong>Delivery Option:</strong> <?= esc($order['delivery_option']) ?></p>
    <p><strong>Total:</strong> $<?= number_format($order['total'], 2) ?></p>
    <p><strong>Status:</strong> <?= esc($order['status']) ?></p> <!-- Show Order Status -->

    <h4>Order Details</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Item</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderDetails as $detail) : ?>
                <tr>
                    <td><?= esc($detail['cake_name']) ?></td>
                    <td><img src="<?= base_url('uploads/' . esc($detail['cake_image'])) ?>" alt="<?= esc($detail['cake_name']) ?>" width="50"></td>
                    <td><?= esc($detail['quantity']) ?></td>
                    <td>$<?= number_format($detail['price'], 2) ?></td>
                    <td>$<?= number_format($detail['price'] * $detail['quantity'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Order not found.</p>
<?php endif; ?>

<?= $this->include('layouts/footer') ?>