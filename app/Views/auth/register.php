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
<body>
  <header>
    <h1>To-Do List</h1>
    <nav>
      <a href="<?= base_url('login') ?>">Log In</a>
      <a href="<?= base_url('register') ?>" class="active">Register</a>
    </nav>
  </header>

  <div class="container-center" style="padding-top:4rem;">
    <h2 style="font-size:2.25rem;font-weight:700;margin-bottom:2rem;">Register</h2>
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
