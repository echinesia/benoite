<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar">
                <div class="position-sticky">
                    <h4>Navigation</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/user">
                                My Pages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/cake_catalog">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/contact_us">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/cart">
                                Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/user/order_history">
                                View Order History
                            </a>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-danger mt-3 w-100">Logout</a>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h2>Order History</h2>

                <?php if (isset($error)) : ?>
                    <div class="alert alert-danger"><?= esc($error) ?></div>
                <?php else : ?>
                    <?php if (!empty($orders)) : ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                    <tr>
                                        <td><?= esc($order['id']) ?></td>
                                        <td><?= esc($order['status']) ?></td>
                                        <td>$<?= number_format($order['total'], 2) ?></td>
                                        <td><?= esc($order['created_at']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No orders found.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </main>
        </div>
    </div>
</body>

<style>
    /* styles.css */
    .sidebar {
        background-color: #343a40;
        color: white;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 100;
    }

    .sidebar .nav-link {
        color: white;
    }

    .sidebar .nav-link.active {
        background-color: #495057;
    }

    .sidebar .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .main-content {
        margin-left: 250px;
    }
</style>

<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>