<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Kanban Board</title>
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            padding: 20px;
        }

        .kanban-board {
            display: flex;
            justify-content: space-between;
        }

        .kanban-column {
            flex: 1;
            margin: 0 10px;
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            min-height: 600px;
        }

        .kanban-column h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 10px;
        }

        .card-header {
            font-weight: bold;
        }

        .card-body {
            padding: 10px;
        }

        .card-footer {
            text-align: right;
        }
    </style>
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
                            <a class="nav-link" href="/user">
                                My Pages
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cake_catalog">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact_us">
                                Contact Us
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/cart">
                                Cart
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/user/order_status">
                                Order Status
                            </a>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-danger mt-3 w-100">Logout</a>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4 main-content">
                <h2>Order Status Kanban Board</h2>

                <div class="kanban-board">
                    <!-- Pending and Processing Column -->
                    <div class="kanban-column">
                        <h3>Pending and Processing</h3>
                        <?php if (!empty($pendingProcessingOrders)) : ?>
                            <?php foreach ($pendingProcessingOrders as $order) : ?>
                                <div class="card">
                                    <div class="card-header">
                                        Order ID: <?= esc($order['id']) ?>
                                    </div>
                                    <div class="card-body">
                                        <strong>Name:</strong> <?= esc($order['customer_name']) ?><br>
                                        <strong>Order Date:</strong> <?= esc($order['order_date']) ?><br>
                                        <strong>Status:</strong> <?= esc($order['status']) ?>
                                    </div>
                                    <div class="card-footer">
                                        <!-- Add action buttons if needed -->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No orders in this status.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Completed Column -->
                    <div class="kanban-column">
                        <h3>Completed</h3>
                        <?php if (!empty($completedOrders)) : ?>
                            <?php foreach ($completedOrders as $order) : ?>
                                <div class="card">
                                    <div class="card-header">
                                        Order ID: <?= esc($order['id']) ?>
                                    </div>
                                    <div class="card-body">
                                        <strong>Name:</strong> <?= esc($order['customer_name']) ?><br>
                                        <strong>Order Date:</strong> <?= esc($order['order_date']) ?><br>
                                        <strong>Status:</strong> <?= esc($order['status']) ?>
                                    </div>
                                    <div class="card-footer">
                                        <!-- Add action buttons if needed -->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No orders in this status.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Canceled Column -->
                    <div class="kanban-column">
                        <h3>Canceled</h3>
                        <?php if (!empty($canceledOrders)) : ?>
                            <?php foreach ($canceledOrders as $order) : ?>
                                <div class="card">
                                    <div class="card-header">
                                        Order ID: <?= esc($order['id']) ?>
                                    </div>
                                    <div class="card-body">
                                        <strong>Name:</strong> <?= esc($order['customer_name']) ?><br>
                                        <strong>Order Date:</strong> <?= esc($order['order_date']) ?><br>
                                        <strong>Status:</strong> <?= esc($order['status']) ?>
                                    </div>
                                    <div class="card-footer">
                                        <!-- Add action buttons if needed -->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>No orders in this status.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>