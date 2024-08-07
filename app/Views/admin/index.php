<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Admin Panel' ?></title>
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
                            <a class="nav-link active" href="admin/manage_orders">
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
                <h2>Admin Dashboard</h2>
                <p>Welcome, admin!</p>
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