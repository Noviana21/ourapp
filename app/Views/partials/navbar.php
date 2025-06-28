<?php if (!session()->get('isLoggedIn')): ?>
<?php $uri = service('uri'); ?>
<nav class="navbar navbar-expand-lg fixed-top shadow-sm custom-navbar">
    <div class="container">
        <a class="navbar-brand text-primary-custom <?= $uri->getSegment(1) === 'home' || $uri->getSegment(1) === '' ? '' : '' ?>" href="<?= base_url('/') ?>">To-Do List</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-primary-custom <?= $uri->getSegment(1) === 'login' ? 'active-link' : '' ?>" href="<?= base_url('login') ?>">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary-custom <?= $uri->getSegment(1) === 'register' ? 'active-link' : '' ?>" href="<?= base_url('register') ?>">Register</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
<?php endif; ?>