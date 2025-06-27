<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | To-Do List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
  <header>
    <h1>To-Do List</h1>
    <nav>
      <a href="<?= base_url('logout') ?>">Log Out</a>
    </nav>
  </header>

  <div class="dashboard-wrapper">
    <aside class="sidebar">
      <input type="text" placeholder="Search tasks..." style="width:100%;height:46px;border-radius:24px;border:1px solid #e0e0e5;margin-bottom:2rem;">

      <h4>Kuliah</h4>
      <p>mie ayam <br> mie ayam <br> mie ayam<br>mie ayam <br> mie ayam <br>mie ayam</p>

      <h4>Kerja</h4>
      <p>mie ayam <br> mie ayam <br> mie ayam<br>mie ayam <br> mie ayam <br>mie ayam</p>
    </aside>

    <main class="content-area">
      <h2>Today</h2>
      <div class="task-card">
        <h5 style="font-weight:600;">Kuliah</h5>
        <p>mie ayam mie ayam mie ayam</p>
      </div>

      <div class="fab">+</div>
    </main>

    <aside class="profile-bar">
      <div>
        <h3><?= session('username') ?? 'Novi' ?></h3>
        <p style="margin:0;"><?= session('email') ?? 'clownlegacy21@gmail.com' ?></p>
      </div>
      <a href="<?= base_url('logout') ?>" class="logout-btn">Log Out</a>
    </aside>
  </div>
</body>
</html>
