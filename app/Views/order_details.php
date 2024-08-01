<?= $this->include('layouts/header') ?>

<body>
    <h1>Order Details</h1>
    <table>
        <tr>
            <th>Order ID</th>
            <td><?= $order['id'] ?></td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td><?= $order['customer_name'] ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?= $order['address'] ?></td>
        </tr>
        <tr>
            <th>Total</th>
            <td><?= $order['total'] ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td><?= $order['status'] ?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?= $order['created_at'] ?></td>
        </tr>
    </table>
    <a href="user/order_history">Back to Order History</a>
</body>

<?= $this->include('layouts/footer') ?>