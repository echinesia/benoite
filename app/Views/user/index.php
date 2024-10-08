<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'My Pages' ?></title>
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
                            <a class="nav-link active" href="/user/order_status">
                                Order Status
                            </a>
                        </li>
                    </ul>
                    <a href="/logout" class="btn btn-danger mt-3 w-100">Logout</a>
                </div>
            </nav>

            <!-- Main content -->
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <h2>Welcome, <?= session()->get('username') ?></h2>
                <p>This is your user page.</p>
            </main>
        </div>
    </div>
</body>

<style>
    /* styles.css */
    .sidebar {
        background-color: #343a40;
        /* Dark background color */
        color: white;
        /* White text color */
        height: 100vh;
        /* Full height */
        position: fixed;
        /* Fixed position */
        top: 0;
        /* Align to the top */
        left: 0;
        /* Align to the left */
        z-index: 100;
        /* Ensure it is above other content */
    }

    .sidebar .nav-link {
        color: white;
        /* White text color for links */
    }

    .sidebar .nav-link.active {
        background-color: #495057;
        /* Slightly lighter background for active link */
    }

    .sidebar .btn-danger {
        background-color: #dc3545;
        /* Button color */
        border-color: #dc3545;
        /* Border color for button */
    }

    .main-content {
        margin-left: 250px;
        /* Adjust according to the width of the sidebar */
    }
</style>

</html>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>