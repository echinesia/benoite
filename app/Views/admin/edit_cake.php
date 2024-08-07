<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cake</title>
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
                <h2>Edit Cake</h2>

                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>

                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>

                <?php if (!empty($cake)) : ?>
                    <form action="/admin/update_cake/<?= esc($cake['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="cake_name" class="form-label">Cake Name</label>
                            <input type="text" class="form-control" id="cake_name" name="cake_name" value="<?= esc($cake['name']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="cake_description" class="form-label">Description</label>
                            <textarea class="form-control" id="cake_description" name="cake_description" required><?= esc($cake['description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?= esc($cake['price']) ?>" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="image_url" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_url" name="image_url">
                            <?php if (!empty($cake['image_url'])) : ?>
                                <img src="<?= base_url('uploads/' . esc($cake['image_url'])) ?>" alt="<?= esc($cake['name']) ?>" width="100">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Cake</button>
                    </form>
                <?php else : ?>
                    <p>Cake not found.</p>
                <?php endif; ?>
            </main>
        </div>
    </div>
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
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>