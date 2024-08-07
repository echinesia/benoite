<?= $this->include('layouts/header') ?>

<h3>Checkout</h3>
<?php if (!empty($cart)) : ?>
    <p>Hello, <?= esc($username) ?>! Here are your order details:</p>
    <form action="<?= base_url('/checkout/complete') ?>" method="post">
        <div class="row">
            <!-- Left column for order details -->
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

                <!-- Add phone number field -->
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                </div>

                <input type="hidden" name="total" value="<?= $total ?>">
            </div>

            <!-- Right column for delivery options -->
            <div class="col-md-6">
                <h4>Delivery Options</h4>
                <div class="mb-3">
                    <input type="radio" id="delivery" name="delivery_option" value="delivery" onchange="calculateTotal()" required>
                    <label for="delivery" class="form-label">Delivery (will add cost $10.00)</label>
                </div>
                <div class="mb-3">
                    <input type="radio" id="pickup" name="delivery_option" value="pickup" onchange="calculateTotal()">
                    <label for="pickup" class="form-label">Pick-up (no additional cost)</label>
                </div>

                <div class="mb-3">
                    <p><strong>Final Total:</strong> $<span id="final_total"><?= number_format($total, 2) ?></span></p>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Complete Purchase</button>
    </form>

    <script>
        function calculateTotal() {
            const total = <?= $total ?>;
            const deliveryCost = 10.00;
            let finalTotal = total;

            if (document.getElementById('delivery').checked) {
                finalTotal += deliveryCost;
            }

            document.getElementById('final_total').textContent = finalTotal.toFixed(2);
            document.querySelector('input[name="total"]').value = finalTotal.toFixed(2);
        }
    </script>
<?php else : ?>
    <p>Your cart is empty.</p>
<?php endif; ?>

<?= $this->include('layouts/footer') ?>