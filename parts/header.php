<?php
$current_page = basename($_SERVER['PHP_SELF']);

function activeClass($page) {
    global $current_page;
    return $current_page === $page ? 'active' : '';
}
?>

<!-- Navigácia -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-warning bg-gradient">
  <div class="container">
    <a class="navbar-brand fw-bold text-dark" href="#">
      <img src="img/adrian.png" alt="" class="img-fluid rounded-circle mx-2" height="50" width="50">
      Adrián Čiffáry
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="mainNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= activeClass('index.php') ?>" href="index.php">Domov</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= activeClass('about.php') ?>" href="about.php">O mne</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= activeClass('portfolio.php') ?>" href="portfolio.php">Portfólio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= activeClass('contact.php') ?>" href="contact.php">Kontakt</a>
        </li>
      </ul>
    </div>
  </div>
</nav>