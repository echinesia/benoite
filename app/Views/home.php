<?= $this->include('layouts/header') ?>

<style>
    body,
    html {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }

    .header-container {
        display: flex;
        align-items: center;
        min-height: 75vh;
        margin-top: 0;
        padding-top: 0;
    }

    .header-left {
        text-align: left;
        padding-left: 3cm;
    }

    .header-right img {
        max-width: 70%;
        height: auto;
    }

    .btn-custom {
        background-color: #000;
        color: #fff;
        border-radius: 50px;
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
        display: inline-block;
        max-width: 150px;
        text-align: center;
        white-space: nowrap;
    }

    .navbar {
        margin-bottom: 0;
    }

    hr.custom-line {
        border: 0;
        height: 1px;
        background: #000;
        margin: 1.5rem 0;
    }

    .carousel-item img {
        width: 100%;
        height: 300px;
        /* Adjust the height as needed */
        object-fit: cover;
    }

    .products-container {
        margin-top: 2rem;
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 1rem;
        text-align: center;
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product-card h5 {
        margin-top: 1rem;
    }

    .social-media {
        margin-top: 2rem;
        margin-bottom: 2rem;
        /* Added margin-bottom */
    }

    .social-media h3 {
        text-align: center;
    }

    .social-links {
        display: flex;
        justify-content: space-around;

    }

    .social-links a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
    }

    .social-links img {
        width: 30px;
        height: 30px;
        margin-right: 0.5rem;
    }
</style>

<div class="container-fluid header-container">
    <div class="row w-100">
        <div class="col-md-6 header-left d-flex flex-column justify-content-center">
            <h2 class="display-4">Welcome to </h2>
            <h2 class="display-4">Benoite Kitchen</h2>
            <p class="mb-4">Delicious homemade cakes made with love.</p>
            <a href="/cake_catalog" class="btn btn-custom">Shop now</a>
        </div>
        <div class="col-md-6 header-right d-flex align-items-center justify-content-center">
            <img src="/uploads/cake_photo.jpg" alt="Cake Photo">
        </div>
    </div>
</div>

<hr class="custom-line">

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/uploads/slide1.png" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="/uploads/slide2.png" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="/uploads/slide3.png" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<hr class="custom-line">

<div class="container social-media">
    <h3>Visit our social media</h3>
    <div class="social-links">
        <a href="https://www.instagram.com/benoite.idn/" target="_blank">
            <img src="/uploads/instagram_icon.png" alt="Instagram Icon">
            share with us
        </a>
        <a href="https://www.facebook.com/people/Benoite-Kitchen/100054797078681/" target="_blank">
            <img src="/uploads/facebook_icon.png" alt="Facebook Icon">
            join on facebook
        </a>
        <a href="https://wa.me/yourwhatsappnumber" target="_blank">
            <img src="/uploads/whatsapp_icon.png" alt="WhatsApp Icon">
            share with us
        </a>
    </div>
</div>

<?= $this->include('layouts/footer') ?>