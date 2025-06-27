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
  <header>
    <h1>To-Do List</h1>
    <nav>
      <a href="<?= base_url('login') ?>">Log In</a>
      <a href="<?= base_url('register') ?>">Register</a>
    </nav>
  </header>

  <section class="container-center" style="padding-top:6rem;">
    <h2 style="font-size:2.5rem;font-weight:700;color:var(--text-dark);">To-Do List</h2>
    <p style="max-width:380px;margin:1rem auto 2rem;">
      Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
    </p>
    <a href="<?= base_url('login') ?>" class="primary-btn" style="width:260px;">Start</a>
  </section>
</body>
</html>
