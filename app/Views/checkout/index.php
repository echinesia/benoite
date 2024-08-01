<?= $this->include('layouts/header') ?>

<h3>Checkout</h3>
<?php if (!empty($cart)) : ?>
    <form action="<?= base_url('/checkout/complete') ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <h4>Order Details</h4>
                <p><strong>Total:</strong> $<?= number_format($total, 2) ?></p>

                <div class="mb-3">
                    <label for="customer_name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>

                <input type="hidden" name="total" value="<?= $total ?>">

                <button type="submit" class="btn btn-primary">Complete Purchase</button>
            </div>
        </div>
    </form>
<?php else : ?>
    <p>Your cart is empty.</p>
<?php endif; ?>

<?= $this->include('layouts/footer') ?>