<?= $this->include('layouts/header') ?>

<body>
    <h1>Order History</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['date'] ?></td>
                    <td><?= $order['status'] ?></td>
                    <td><?= $order['total'] ?></td>
                    <td><a href="/order_details/<?= $order['id'] ?>">View</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<?= $this->include('layouts/footer') ?>