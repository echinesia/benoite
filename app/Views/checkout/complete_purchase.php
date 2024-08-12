<?= $this->include('layouts/header') ?>

<div class="container">
    <h3 class="my-4">Order Summary</h3>
    <?php if ($order) : ?>
        <div class="order-info mb-4">
            <p><strong>Order ID:</strong> <?= esc($order['id']) ?></p>
            <p><strong>Name:</strong> <?= esc($order['customer_name']) ?></p>
            <p><strong>Address:</strong> <?= esc($order['address']) ?></p>
            <p><strong>Phone Number:</strong> <?= esc($order['phone_number']) ?></p>
            <p><strong>Delivery Option:</strong> <?= esc($order['delivery_option']) ?></p>
            <p><strong>Total:</strong> $<?= number_format($order['total'], 2) ?></p>
            <p><strong>Status:</strong> <?= esc($order['status']) ?></p> <!-- Show Order Status -->
        </div>

        <h4 class="my-4">Order Details</h4>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
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

        <div class="my-4 text-center">
            <button class="btn btn-primary" onclick="printNota()">Cetak Nota</button>
        </div>
    <?php else : ?>
        <p class="alert alert-warning">Order not found.</p>
    <?php endif; ?>
</div>

<?= $this->include('layouts/footer') ?>

<script>
    function printNota() {
        var content = `
        <div style="font-family: Arial, sans-serif; padding: 20px; max-width: 800px; margin: auto;">
            <h3 style="text-align: center; color: #333;">Order Summary</h3>
            <p><strong>Order ID:</strong> <?= esc($order['id']) ?></p>
            <p><strong>Name:</strong> <?= esc($order['customer_name']) ?></p>
            <p><strong>Address:</strong> <?= esc($order['address']) ?></p>
            <p><strong>Phone Number:</strong> <?= esc($order['phone_number']) ?></p>
            <p><strong>Delivery Option:</strong> <?= esc($order['delivery_option']) ?></p>
            <p><strong>Total:</strong> $<?= number_format($order['total'], 2) ?></p>
            
            <h4 style="border-bottom: 2px solid #007bff; padding-bottom: 5px;">Order Details</h4>
            <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                <thead>
                    <tr style="background-color: #f1f1f1;">
                        <th style="padding: 8px; text-align: left;">Item</th>
                        <th style="padding: 8px; text-align: left;">Image</th>
                        <th style="padding: 8px; text-align: right;">Quantity</th>
                        <th style="padding: 8px; text-align: right;">Price</th>
                        <th style="padding: 8px; text-align: right;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderDetails as $detail) : ?>
                        <tr>
                            <td style="padding: 8px;"><?= esc($detail['cake_name']) ?></td>
                            <td style="padding: 8px; text-align: center;"><img src="<?= base_url('uploads/' . esc($detail['cake_image'])) ?>" alt="<?= esc($detail['cake_name']) ?>" width="50"></td>
                            <td style="padding: 8px; text-align: right;"><?= esc($detail['quantity']) ?></td>
                            <td style="padding: 8px; text-align: right;">$<?= number_format($detail['price'], 2) ?></td>
                            <td style="padding: 8px; text-align: right;">$<?= number_format($detail['price'] * $detail['quantity'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <div style="text-align: center; margin-top: 20px;">
                <img src="<?= base_url('/uploads/barcode.png') ?>" style="width: 100px; height: auto;" alt="Barcode">
            </div>
            
            <div style="text-align: center; margin-top: 20px;">
                <p>Setelah melakukan pembayaran melalui QRIS, kirimkan bukti pembayarannya ke <a href="https://wa.me/PHONE_NUMBER" target="_blank" style="color: #007bff; text-decoration: none; font-weight: bold;">link ini</a>.</p>
            </div>
        </div>
    `;

        var newWindow = window.open('', '', 'width=800, height=600');
        newWindow.document.write('<html><head><title>Order Nota</title>');
        newWindow.document.write('</head><body>');
        newWindow.document.write(content);
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
    }
</script>