<?= $this->include('layouts/header') ?>

<div class="container my-5">
    <div class="text-center mb-4">
        <h1 class="display-4">Contact Us</h1>
        <p class="lead">We'd love to hear from you! Reach out for orders or inquiries.</p>
    </div>

    <div class="row align-items-center">
        <!-- Left Side -->
        <div class="col-md-6 text-center mb-4 mb-md-0">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <img src="/uploads/barcode.png" alt="Admin Contact Barcode" class="img-fluid mb-3" style="max-width: 200px;">
                    <p class="text-muted">Scan barcode untuk menghubungi admin</p>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-md-6 text-center">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h3 class="mb-4">Find us on social media</h3>
                    <p>
                        <a href="https://www.facebook.com/benoitekitchen" target="_blank" class="text-decoration-none">
                            <img src="/uploads/facebook_icon.png" alt="Facebook" style="width: 40px; height: 40px;" class="mr-2">
                            <span class="h5">Benoite Kitchen</span>
                        </a>
                    </p>
                    <p>
                        <a href="https://www.instagram.com/benoitekitchen" target="_blank" class="text-decoration-none">
                            <img src="/uploads/instagram_icon.png" alt="Instagram" style="width: 40px; height: 40px;" class="mr-2">
                            <span class="h5">Benoite Kitchen</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>