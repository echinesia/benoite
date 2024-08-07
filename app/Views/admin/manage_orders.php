<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
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
                            <a class="nav-link active" href="/admin">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/manage_orders">
                                Manage Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/manage_cake">
                                Manage Cake
                            </a>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-danger mt-3 w-100">Logout</a>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h2>Manage Orders</h2>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?php if (!empty($orders)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Phone Number</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= esc($order['id']) ?></td>
                                    <td><?= esc($order['customer_name']) ?></td>
                                    <td><?= esc($order['phone_number']) ?></td>
                                    <td>$<?= number_format($order['total'], 2) ?></td>
                                    <td><?= esc($order['status']) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#proceedModal" data-order-id="<?= esc($order['id']) ?>" data-customer-name="<?= esc($order['customer_name']) ?>" data-customer-address="<?= esc($order['address']) ?>" data-phone-number="<?= esc($order['phone_number']) ?>" data-delivery-option="<?= esc($order['delivery_option']) ?>">
                                            Proceed
                                        </button>
                                        <form action="/admin/update_order_status/<?= esc($order['id']) ?>/Completed" method="post" style="display:inline-block;">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-success">Done</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No pending orders found.</p>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <!-- Proceed Modal -->
    <div class="modal fade" id="proceedModal" tabindex="-1" aria-labelledby="proceedModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="proceedModalLabel">Proceed Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Customer Name:</strong> <span id="modalCustomerName"></span></p>
                    <p><strong>Customer Address:</strong> <span id="modalCustomerAddress"></span></p>
                    <p><strong>Phone Number:</strong> <span id="modalPhoneNumber"></span></p>
                    <p><strong>Delivery Option:</strong> <span id="modalDeliveryOption"></span></p>
                    <p>Proceed this order?</p>
                </div>
                <div class="modal-footer">
                    <form id="proceedForm" action="" method="post">
                        <?= csrf_field() ?>
                        <button type="submit" class="btn btn-warning">Yes</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        var proceedModal = document.getElementById('proceedModal');
        proceedModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var orderId = button.getAttribute('data-order-id');
            var customerName = button.getAttribute('data-customer-name');
            var customerAddress = button.getAttribute('data-customer-address');
            var phoneNumber = button.getAttribute('data-phone-number');
            var deliveryOption = button.getAttribute('data-delivery-option');

            var modalCustomerName = proceedModal.querySelector('#modalCustomerName');
            var modalCustomerAddress = proceedModal.querySelector('#modalCustomerAddress');
            var modalPhoneNumber = proceedModal.querySelector('#modalPhoneNumber');
            var modalDeliveryOption = proceedModal.querySelector('#modalDeliveryOption');
            var proceedForm = proceedModal.querySelector('#proceedForm');

            modalCustomerName.textContent = customerName;
            modalCustomerAddress.textContent = customerAddress;
            modalPhoneNumber.textContent = phoneNumber;
            modalDeliveryOption.textContent = deliveryOption;

            proceedForm.action = "/admin/update_order_status/" + orderId + "/Processing";
        });
    </script>
</body>

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
    }
</style>

</html>