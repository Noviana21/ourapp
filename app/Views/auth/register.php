<?php if (!defined('APPPATH')) exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
  </head>
  <body class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <?= view('partials/navbar') ?>

    <div class="container-center">
      <h2 class="gradient-heading">Register</h2>
      <div class="card-form">
        <form action="<?= base_url('register/process') ?>" method="post">
          <input type="text" name="username" placeholder="Enter your username" required>
          <input type="email" name="email" placeholder="Enter your email" required>
          <input type="password" name="password" placeholder="Enter your password" required>
          <button type="submit" class="primary-btn">Register</button>
        </form>
      </div>
    </div>
  </body>
</html>
