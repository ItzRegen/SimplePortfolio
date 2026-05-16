<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: http://localhost/SimplePortfolio/login.php');
    exit();
}

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/users.php');
$users = new Users();

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;

if ($action === 'password' && $id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password'] ?? '');
    $confirm  = trim($_POST['confirm'] ?? '');

    if ($password === $confirm && strlen($password) >= 6) {
        $users->updatePassword($id, $password);
        header('Location: users.php');
        exit();
    }
}

$vsetciUsers = $users->getAll();

$editUser = null;
if ($action === 'password' && $id) {
    foreach ($vsetciUsers as $u) {
        if ($u['ID'] == $id) {
            $editUser = $u;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Používatelia – Admin</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
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
            <a href="dashboard.php" class="nav-link text-secondary" style="font-size: 13px;">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="portfolio.php" class="nav-link text-secondary" style="font-size: 13px;">Portfólio</a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link active bg-warning text-dark fw-semibold" style="font-size: 13px;">Používatelia</a>
          </li>
        </ul>

        <hr class="border-secondary">
        <a href="../index.php" class="nav-link text-secondary mb-2" style="font-size: 13px;">← Domovská stránka</a>
        <a href="../db/logout.php" class="nav-link text-danger" style="font-size: 13px;">Odhlásiť sa</a>
      </div>

      <div class="flex-grow-1 p-4">

        <?php if ($action === 'list'): ?>

          <!-- List -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Používatelia</h4>
          </div>

          <div class="card border border-secondary rounded-3" style="background-color: #111;">
            <div class="table-responsive">
              <table class="table table-dark table-hover mb-0" style="background-color: #111;">
                <thead style="border-bottom: 1px solid #333;">
                  <tr>
                    <th style="font-size: 11px; color: #888;">#</th>
                    <th style="font-size: 11px; color: #888;">Email</th>
                    <th style="font-size: 11px; color: #888;">Akcie</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($vsetciUsers as $u): ?>
                    <tr>
                      <td class="text-secondary" style="font-size: 13px;"><?= $u['ID'] ?></td>
                      <td style="font-size: 13px;"><?= htmlspecialchars($u['email']) ?></td>
                      <td>
                        <a href="users.php?action=password&id=<?= $u['ID'] ?>" class="btn btn-sm btn-outline-warning" style="font-size: 12px;">Zmeniť heslo</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>

        <?php elseif ($action === 'password' && $editUser): ?>

          <!-- Zmena hesla -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Zmeniť heslo</h4>
            <a href="users.php" class="btn btn-outline-secondary" style="font-size: 13px;">← Späť</a>
          </div>

          <div class="card border border-secondary rounded-3 p-4" style="background-color: #111; max-width: 500px;">
            <p class="text-secondary mb-4" style="font-size: 13px;">Účet: <span class="text-white"><?= htmlspecialchars($editUser['email']) ?></span></p>

            <form method="post" action="users.php?action=password&id=<?= $editUser['ID'] ?>">
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Nové heslo</label>
                <input type="password" name="password" class="form-control custom-focus" placeholder="Minimálne 6 znakov" required />
              </div>
              <div class="mb-4">
                <label class="form-label" style="font-size: 12px; color: #888;">Potvrdiť heslo</label>
                <input type="password" name="confirm" class="form-control custom-focus" placeholder="Zopakujte heslo" required />
              </div>
              <button type="submit" class="btn btn-warning fw-bold w-100">Uložiť heslo</button>
            </form>
          </div>

        <?php endif; ?>

      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>