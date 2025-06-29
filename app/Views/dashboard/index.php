<?php if (!defined('APPPATH')) exit('No direct script access allowed'); ?>
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
  <div class="dashboard-wrapper">
    <div class="sidebar" style="position: relative;">
      <div style="position: sticky; top: 0; z-index: 10;">
        <input id="taskSearch" type="text" placeholder="Search tasks..." style="width:100%; height:46px; border-radius:24px; border:1px solid #e0e0e5; margin-bottom:2rem;">
      </div>
      <?php foreach ($categories as $category): ?>
        <?php
        $categoryTasks = array_filter($tasks, function ($task) use ($category) {
          return $task['category_id'] == $category['category_id'];
        });
        ?>
        <?php if (!empty($categoryTasks)): ?>
          <h5><?= esc($category['name']) ?></h5>
          <div class="task-list">
            <?php foreach ($categoryTasks as $task): ?>
              <p class="task-item"><?= esc($task['title']) ?></p>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="content-area" style="overflow-y: auto;">
      <h2 class="gradient-heading2">Today</h2>
      <?php
      $today = date('Y-m-d');
      $todayTasks = [];
      foreach ($tasks as $task) {
        if (date('Y-m-d', strtotime($task['deadline'])) == $today) {
          $todayTasks[] = $task;
        }
      }
      if (empty($todayTasks)):
      ?>
        <div>
          <h6 class="m-2">You don't have any tasks with a deadline today.</h6>
        </div>
      <?php else: ?>
        <?php foreach ($todayTasks as $task): ?>
          <?php
          $categoryName = '';
          foreach ($categories as $category) {
            if ($category['category_id'] == $task['category_id']) {
              $categoryName = esc($category['name']);
              break;
            }
          }
          ?>
          <div class="task-card mb-3">
            <h4 class="mb-3 gradient-heading3 py-1" style="font-weight:600;"><?= esc($task['title']) ?></h4>
            <p style="margin-bottom: 0; line-height: 2;">
              <strong>Category: </strong><?= esc($categoryName) ?>
              <br>
              <strong>Description: </strong><?= esc($task['description']) ?>
              <br>
              <?php
              $status = strtolower($task['status']);
              $statusLabel = $status === 'done' ? 'Done' : ($status === 'pending' ? 'Pending' : 'No Status');
              $statusClass = $status === 'done' ? 'text-success' : ($status === 'pending' ? 'text-warning-dark' : 'text-muted');
              ?>
              <strong>Status:</strong> <span class="<?= $statusClass ?>"><?= esc(ucfirst($statusLabel)) ?></span>
            </p>
            <div class="mt-3 d-flex gap-2 justify-content-end">
              <a href="<?= base_url('dashboard?edit=' . $task['task_id']) ?>" method="post" class="btn primary-bg">Edit</a>
              <form action="<?= base_url('tasks/delete/' . $task['task_id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this task?');">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <hr class="mt-5 mb-4">
      <h2 class="gradient-heading2">Upcoming Tasks</h2>
      <?php
      $upcomingTasks = [];
      foreach ($tasks as $task) {
        if (date('Y-m-d', strtotime($task['deadline'])) > date('Y-m-d')) {
          $upcomingTasks[] = $task;
        }
      }
      ?>

      <?php if (empty($upcomingTasks)): ?>
        <h6 class="m-2">You don't have any upcoming tasks.</h6>
      <?php else: ?>
        <?php foreach ($upcomingTasks as $task): ?>
          <?php
          $categoryName = '';
          foreach ($categories as $category) {
            if ($category['category_id'] == $task['category_id']) {
              $categoryName = esc($category['name']);
              break;
            }
          }
          ?>
          <div class="task-card mb-3">
            <h4 class="mb-3 gradient-heading3 py-1" style="font-weight:600;"><?= esc($task['title']) ?></h4>
            <p style="margin-bottom: 0; line-height: 2;">
              <strong>Category:</strong> <?= esc($categoryName) ?>
              <br>
              <strong>Description:</strong> <?= esc($task['description']) ?>
              <br>
              <strong>Deadline:</strong> <?= esc($task['deadline']) ?>
              <br>
              <?php
              $status = strtolower($task['status']);
              $statusLabel = $status === 'done' ? 'Done' : ($status === 'pending' ? 'Pending' : 'No Status');
              $statusClass = $status === 'done' ? 'text-success' : ($status === 'pending' ? 'text-warning-dark' : 'text-muted');
              ?>
              <strong>Status:</strong> <span class="<?= $statusClass ?>"><?= esc(ucfirst($statusLabel)) ?></span>
            </p>
            <div class="mt-3 d-flex gap-2 justify-content-end">
              <a href="<?= base_url('dashboard?edit=' . $task['task_id']) ?>" class="btn primary-bg">Edit</a>
              <form action="<?= base_url('tasks/delete/' . $task['task_id']) ?>" method="post" onsubmit="return confirm('Are you sure?');">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <hr class="mt-5 mb-4">
      <h2 class="gradient-heading2">Past Tasks</h2>
      <?php
      $pastTasks = [];
      foreach ($tasks as $task) {
        if (date('Y-m-d', strtotime($task['deadline'])) < date('Y-m-d')) {
          $pastTasks[] = $task;
        }
      }
      ?>

      <?php if (empty($pastTasks)): ?>
        <h6 class="m-2">You don't have any past tasks.</h6>
      <?php else: ?>
        <?php foreach ($pastTasks as $task): ?>
          <?php
          $categoryName = '';
          foreach ($categories as $category) {
            if ($category['category_id'] == $task['category_id']) {
              $categoryName = esc($category['name']);
              break;
            }
          }
          ?>
          <div class="task-card mb-3">
            <h4 class="mb-3 gradient-heading3 py-1" style="font-weight:600;"><?= esc($task['title']) ?></h4>
            <p style="margin-bottom: 0; line-height: 2;">
              <strong>Category:</strong> <?= esc($categoryName) ?>
              <br>
              <strong>Description:</strong> <?= esc($task['description']) ?>
              <br>
              <strong>Deadline:</strong> <?= esc($task['deadline']) ?>
              <br>
              <?php
              $status = strtolower($task['status']);
              $statusLabel = $status === 'done' ? 'Done' : ($status === 'pending' ? 'Pending' : 'No Status');
              $statusClass = $status === 'done' ? 'text-success' : ($status === 'pending' ? 'text-warning-dark' : 'text-muted');
              ?>
              <strong>Status:</strong> <span class="<?= $statusClass ?>"><?= esc(ucfirst($statusLabel)) ?></span>
            </p>
            <div class="mt-3 d-flex gap-2 justify-content-end">
              <a href="<?= base_url('dashboard?edit=' . $task['task_id']) ?>" class="btn primary-bg">Edit</a>
              <form action="<?= base_url('tasks/delete/' . $task['task_id']) ?>" method="post" onsubmit="return confirm('Are you sure?');">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <div class="fab" data-bs-toggle="modal" data-bs-target="#addTaskModal">+</div>

    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px;">
          <div class="modal-header">
            <h5 class="modal-title gradient-heading3 p-1" id="addTaskModalLabel">Task</h5>
            <button type="button" class="btn-close mx-1 p-1" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body py-2 px-4">
            <?php $isEditing = isset($taskEdit) && is_array($taskEdit); ?>
            <form action="<?= base_url($isEditing ? 'tasks/update/' . $taskEdit['task_id'] : 'tasks/store') ?>" method="post">
              <?= csrf_field() ?>
              <div class="mb-3 mt-1">
                <label for="title" class="form-label">Task Title</label>
                <input type="text" name="title" id="title" class="form-control rounded-2" required value="<?= $isEditing ? esc($taskEdit['title']) : '' ?>">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="2" required><?= $isEditing ? esc($taskEdit['description']) : '' ?></textarea>
              </div>
              <div class="mb-3">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="date" name="deadline" id="deadline" class="form-control" required value="<?= $isEditing ? esc($taskEdit['deadline']) : '' ?>">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                  <option value="pending" <?= isset($taskEdit['status']) && $taskEdit['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                  <option value="done" <?= isset($taskEdit['status']) && $taskEdit['status'] == 'done' ? 'selected' : '' ?>>Done</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category" class="form-select">
                  <?php foreach ($categories as $category): ?>
                    <option value="<?= esc($category['category_id']) ?>" <?= $isEditing && $taskEdit['category_id'] == $category['category_id'] ? 'selected' : '' ?>><?= esc($category['name']) ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="m-2">
                <button type="submit" class="primary-btn"><?= $isEditing ? 'Update Task' : 'Add Task' ?></button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="profile-bar">
      <div>
        <h3><?= session('username') ?? 'Username' ?></h3>
        <p style="margin:0;"><?= session('email') ?? 'gmail@gmail.com' ?></p>
      </div>
      <a href="<?= base_url('logout') ?>" class="logout-btn">Log Out</a>
    </div>
  </div>
</body>

<script>
  document.getElementById('taskSearch').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase();
    const taskItems = document.querySelectorAll('.task-item');

    taskItems.forEach(item => {
      const text = item.textContent.toLowerCase();
      if (text.includes(searchTerm)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  });

  window.onload = () => {
    <?php if ($isEditing): ?>
      const editModal = new bootstrap.Modal(document.getElementById('addTaskModal'));
      editModal.show();
    <?php endif; ?>
  };

  const modal = document.getElementById('addTaskModal');
  modal.addEventListener('hidden.bs.modal', function() {
    const url = new URL(window.location.href);
    url.searchParams.delete('edit');
    window.history.replaceState({}, document.title, url.pathname);
  });

  modal.addEventListener('hidden.bs.modal', function() {
    const url = new URL(window.location.href);
    url.searchParams.delete('edit');
    window.history.replaceState({}, document.title, url.pathname);

    <?php if ($isEditing): ?>
      // Paksa reload agar data taskEdit hilang
      location.reload();
    <?php endif; ?>
  });

  <?php if ($isEditing): ?>
    const editModal = new bootstrap.Modal(modal);
    window.onload = () => editModal.show();
  <?php endif; ?>
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>