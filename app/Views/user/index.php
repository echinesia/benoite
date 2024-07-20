<?= $this->include('layouts/header') ?>

<div class="container">
    <h2>Welcome, <?= session()->get('username') ?></h2>
    <p>This is your user page.</p>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>

<?= $this->include('layouts/footer') ?>