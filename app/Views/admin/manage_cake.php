<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cakes</title>
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
                <h2>Manage Cakes</h2>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <!-- Add Cake Form -->
                <form action="/admin/add_cake" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="name" class="form-label">Cake Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image_url" name="image_url" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Cake</button>
                </form>

                <h4 class="mt-5">Existing Cakes</h4>
                <?php if (!empty($cakes)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cakes as $cake) : ?>
                                <tr>
                                    <td><?= esc($cake['id']) ?></td>
                                    <td><?= esc($cake['name']) ?></td>
                                    <td><?= esc($cake['description']) ?></td>
                                    <td>$<?= number_format($cake['price'], 2) ?></td>
                                    <td><img src="<?= base_url('uploads/' . esc($cake['image_url'])) ?>" alt="<?= esc($cake['name']) ?>" width="50"></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-cake-id="<?= esc($cake['id']) ?>" data-cake-name="<?= esc($cake['name']) ?>" data-cake-description="<?= esc($cake['description']) ?>" data-cake-price="<?= esc($cake['price']) ?>">
                                            Edit
                                        </button>
                                        <form action="/admin/delete_cake/<?= esc($cake['id']) ?>" method="post" style="display:inline-block;">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p>No cakes found.</p>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Cake</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="/admin/edit_cake" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" id="editCakeId" name="id">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Cake Name</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" name="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="editPrice" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="editImageUrl" class="form-label">Image</label>
                            <input type="file" class="form-control" id="editImageUrl" name="image_url">
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmEditModal" id="confirmEditButton">
                            Save changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Confirm Edit Modal -->
    <div class="modal fade" id="confirmEditModal" tabindex="-1" aria-labelledby="confirmEditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmEditModalLabel">Confirm Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Cake Name:</strong> <span id="confirmEditCakeName"></span></p>
                    <p><strong>Cake Description:</strong> <span id="confirmEditCakeDescription"></span></p>
                    <p><strong>Price:</strong> <span id="confirmEditCakePrice"></span></p>
                    <p>Apakah data kuenya sudah benar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary" id="submitEditFormButton">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        var editModal = document.getElementById('editModal');
        var confirmEditModal = document.getElementById('confirmEditModal');
        var editForm = document.getElementById('editForm');
        var confirmEditCakeName = document.getElementById('confirmEditCakeName');
        var confirmEditCakeDescription = document.getElementById('confirmEditCakeDescription');
        var confirmEditCakePrice = document.getElementById('confirmEditCakePrice');
        var submitEditFormButton = document.getElementById('submitEditFormButton');

        editModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var cakeId = button.getAttribute('data-cake-id');
            var cakeName = button.getAttribute('data-cake-name');
            var cakeDescription = button.getAttribute('data-cake-description');
            var cakePrice = button.getAttribute('data-cake-price');

            var modalTitle = editModal.querySelector('.modal-title');
            var editCakeId = editModal.querySelector('#editCakeId');
            var editName = editModal.querySelector('#editName');
            var editDescription = editModal.querySelector('#editDescription');
            var editPrice = editModal.querySelector('#editPrice');

            modalTitle.textContent = 'Edit Cake';
            editCakeId.value = cakeId;
            editName.value = cakeName;
            editDescription.value = cakeDescription;
            editPrice.value = cakePrice;

            document.getElementById('confirmEditButton').addEventListener('click', function() {
                confirmEditCakeName.textContent = editName.value;
                confirmEditCakeDescription.textContent = editDescription.value;
                confirmEditCakePrice.textContent = editPrice.value;
            });
        });

        submitEditFormButton.addEventListener('click', function() {
            editForm.submit();
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