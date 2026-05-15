<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: http://localhost/SimplePortfolio/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard – Adrián Čiffáry</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <!-- Custom font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body class="text-white" style="background-color: #000; font-family: 'Montserrat', sans-serif;">

    <div class="d-flex">

      <!-- Sidebar -->
      <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 230px; min-height: 100vh; background-color: #111; border-right: 1px solid #222;">

        <span class="fw-bold text-warning mb-1" style="font-size: 13px; letter-spacing: .1em; text-transform: uppercase;">Admin Panel</span>
        <span class="text-secondary mb-4" style="font-size: 11px;">Adrián Čiffáry</span>

        <ul class="nav nav-pills flex-column mb-auto gap-1">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active bg-warning text-dark fw-semibold" style="font-size: 13px;">
              Dashboard
            </a>
          </li>

          <li class="nav-item">
            <a href="users.php" class="nav-link text-secondary" style="font-size: 13px;">
              Používatelia
            </a>
          </li>
          <li class="nav-item">
            <a href="portfolio.php" class="nav-link text-secondary" style="font-size: 13px;">
              Portfólio
            </a>
          </li>
        </ul>

        <hr class="border-secondary">

        <a href="index.php" class="nav-link text-secondary mb-2" style="font-size: 13px;">← Domovská stránka</a>
        <a href="db/logout.php" class="nav-link text-danger" style="font-size: 13px;">Odhlásiť sa</a>
      </div>

      <!-- Main content -->
      <div class="flex-grow-1 p-4">

        <!-- Topbar -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold mb-0">Dashboard</h4>
          <span class="badge bg-warning text-dark" style="font-size: 11px; letter-spacing: .06em;">● Prihlásený</span>
        </div>

        <!-- Stat cards -->
        <div class="row g-3 mb-4">
          <div class="col-6 col-md-3">
            <div class="card border border-secondary rounded-3 p-3" style="background-color: #111;">
              <div class="text-secondary mb-1" style="font-size: 11px; text-transform: uppercase; letter-spacing: .08em;">Projekty</div>
              <div class="fw-bold" style="font-size: 28px;">0</div>
              <div class="text-secondary" style="font-size: 11px;">celkom</div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border border-secondary rounded-3 p-3" style="background-color: #111;">
              <div class="text-secondary mb-1" style="font-size: 11px; text-transform: uppercase; letter-spacing: .08em;">Používatelia</div>
              <div class="fw-bold" style="font-size: 28px;">0</div>
              <div class="text-secondary" style="font-size: 11px;">registrovaní</div>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card border border-secondary rounded-3 p-3" style="background-color: #111;">
              <div class="text-secondary mb-1" style="font-size: 11px; text-transform: uppercase; letter-spacing: .08em;">Session</div>
              <div class="fw-bold text-warning" style="font-size: 14px; margin-top: 6px;">Aktívna</div>
              <div class="text-secondary" style="font-size: 11px;">práve teraz</div>
            </div>
          </div>
        </div>

        <!-- Users & Portfolio sections -->
        <div class="row g-3">

          <!-- Users -->
          <div class="col-12 col-md-6">
            <div class="card border border-secondary rounded-3 p-4" style="background-color: #111;">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0 text-uppercase" style="font-size: 12px; letter-spacing: .1em; color: #888;">Používatelia</h6>
                <a href="users.php" class="btn btn-sm btn-outline-warning" style="font-size: 11px;">Spravovať</a>
              </div>
              <p class="text-secondary mb-3" style="font-size: 12px;">Správa používateľských účtov – zobrazenie, úprava, mazanie.</p>
              <div class="d-flex gap-2">
                <a href="users.php?action=add" class="btn btn-warning btn-sm fw-semibold" style="font-size: 12px;">+ Pridať</a>
                <a href="users.php" class="btn btn-outline-secondary btn-sm" style="font-size: 12px;">Zobraziť všetkých</a>
              </div>
            </div>
          </div>

          <!-- Portfolio -->
          <div class="col-12 col-md-6">
            <div class="card border border-secondary rounded-3 p-4" style="background-color: #111;">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-bold mb-0 text-uppercase" style="font-size: 12px; letter-spacing: .1em; color: #888;">Portfólio</h6>
                <a href="portfolio.php" class="btn btn-sm btn-outline-warning" style="font-size: 11px;">Spravovať</a>
              </div>
              <p class="text-secondary mb-3" style="font-size: 12px;">Správa projektov v portfóliu – pridávanie, úprava, mazanie.</p>
              <div class="d-flex gap-2">
                <a href="portfolio.php?action=add" class="btn btn-warning btn-sm fw-semibold" style="font-size: 12px;">+ Pridať</a>
                <a href="portfolio.php" class="btn btn-outline-secondary btn-sm" style="font-size: 12px;">Zobraziť všetky</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>