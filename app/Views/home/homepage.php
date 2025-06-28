<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <?= view('partials/navbar') ?>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <section class="d-flex flex-column justify-content-center align-items-center text-center" style="height:100vh;">
    <h2 class="gradient-heading">To-Do List</h2>
    <p style="max-width:360px;margin:1rem auto 2rem;">
      To-do lists help you organize your work and keep track of tasks. A good digital to-do list makes it easier to get work done—and makes it harder to miss deadlines. <br>-zapier
    </p>
    <a href="<?= base_url('login') ?>" class="primary-btn btn btn-primary" style="width:260px;">Start</a>
  </section>
</body>
</html>
