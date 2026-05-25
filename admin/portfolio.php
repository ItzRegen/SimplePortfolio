<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: http://localhost/SimplePortfolio/login.php');
    exit();
}

if (!defined('__ROOT__')) {
    define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__.'/classes/portfolio.php');

$portfolio = new Portfolio();

$action = $_GET['action'] ?? 'list';
$id = $_GET['id'] ?? null;
$error = '';
$success = '';

if ($action === 'delete' && $id) {
    $portfolio->delete($id);
    header('Location: portfolio.php');
    exit();
}

if ($action === 'edit' && $id && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $url         = trim($_POST['url'] ?? '');
    $image       = $portfolio->getById($id)['image'];

    if (!empty($_FILES['image']['name'])) {
        $image = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
    }

    $portfolio->update($id, $title, $description, $image, $url);
    header('Location: portfolio.php');
    exit();
}

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title       = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $url         = trim($_POST['url'] ?? '');
    $image       = '';

    if (!empty($_FILES['image']['name'])) {
        $image = time() . '_' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
    }

    $portfolio->create($title, $description, $image, $url);
    header('Location: portfolio.php');
    exit();
}

$projekt = null;
if ($action === 'edit' && $id) {
    $projekt = $portfolio->getById($id);
}

$projekty = $portfolio->getAll();
?>
<!DOCTYPE html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfólio – Admin</title>

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
            <a href="portfolio.php" class="nav-link active bg-warning text-dark fw-semibold" style="font-size: 13px;">Portfólio</a>
          </li>
          <li class="nav-item">
            <a href="users.php" class="nav-link text-secondary" style="font-size: 13px;">Používatelia</a>
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
            <h4 class="fw-bold mb-0">Portfólio</h4>
            <a href="portfolio.php?action=add" class="btn btn-warning fw-bold" style="font-size: 13px;">+ Pridať projekt</a>
          </div>

          <?php if (empty($projekty)): ?>
            <div class="card border border-secondary rounded-3 p-4 text-center" style="background-color: #111;">
              <p class="text-secondary mb-0">Žiadne projekty. <a href="portfolio.php?action=add" class="text-warning">Pridajte prvý.</a></p>
            </div>
          <?php else: ?>
            <div class="card border border-secondary rounded-3" style="background-color: #111;">
              <div class="table-responsive">
                <table class="table table-dark table-hover mb-0" style="background-color: #111;">
                  <thead style="border-bottom: 1px solid #333;">
                    <tr>
                      <th style="font-size: 11px; color: #888;">#</th>
                      <th style="font-size: 11px; color: #888;">Obrázok</th>
                      <th style="font-size: 11px; color: #888;">Názov</th>
                      <th style="font-size: 11px; color: #888;">Popis</th>
                      <th style="font-size: 11px; color: #888;">URL</th>
                      <th style="font-size: 11px; color: #888;">Akcie</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($projekty as $p): ?>
                      <tr>
                        <td class="text-secondary" style="font-size: 13px;"><?= $i++ ?></td>
                        <td>
                          <img src="../uploads/<?= htmlspecialchars($p['image']) ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                        </td>
                        <td style="font-size: 13px;"><?= htmlspecialchars($p['title']) ?></td>
                        <td class="text-secondary" style="font-size: 13px; max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?= htmlspecialchars($p['description']) ?></td>
                        <td style="font-size: 13px;">
                          <?php if ($p['url']): ?>
                            <a href="<?= htmlspecialchars($p['url']) ?>" target="_blank" class="text-warning">Otvoriť</a>
                          <?php else: ?>
                            <span class="text-secondary">—</span>
                          <?php endif; ?>
                        </td>
                        <td>
                          <div class="d-flex gap-2">
                            <a href="portfolio.php?action=edit&id=<?= $p['ID'] ?>" class="btn btn-sm btn-outline-warning" style="font-size: 12px;">Upraviť</a>
                            <a href="portfolio.php?action=delete&id=<?= $p['ID'] ?>" class="btn btn-sm btn-outline-danger" style="font-size: 12px;" onclick="return confirm('Naozaj chcete vymazať tento projekt?')">Vymazať</a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          <?php endif; ?>

        <?php elseif ($action === 'add'): ?>

          <!-- Pridanie projektu -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Pridať projekt</h4>
            <a href="portfolio.php" class="btn btn-outline-secondary" style="font-size: 13px;">← Späť</a>
          </div>

          <div class="card border border-secondary rounded-3 p-4" style="background-color: #111; max-width: 600px;">
            <form method="post" action="portfolio.php?action=add" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Názov</label>
                <input type="text" name="title" class="form-control custom-focus" placeholder="Názov projektu" required />
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Popis</label>
                <textarea name="description" class="form-control custom-focus" rows="4" placeholder="Popis projektu" required></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Obrázok</label>
                <input type="file" name="image" class="form-control custom-focus" accept="image/*" required />
              </div>
              <div class="mb-4">
                <label class="form-label" style="font-size: 12px; color: #888;">URL</label>
                <input type="url" name="url" class="form-control custom-focus" placeholder="https://..." />
              </div>
              <button type="submit" class="btn btn-warning fw-bold w-100">Pridať projekt</button>
            </form>
          </div>

        <?php elseif ($action === 'edit' && $projekt): ?>

          <!-- Úprava projektu -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Upraviť projekt</h4>
            <a href="portfolio.php" class="btn btn-outline-secondary" style="font-size: 13px;">← Späť</a>
          </div>

          <div class="card border border-secondary rounded-3 p-4" style="background-color: #111; max-width: 600px;">
            <form method="post" action="portfolio.php?action=edit&id=<?= $projekt['ID'] ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Názov</label>
                <input type="text" name="title" class="form-control custom-focus" value="<?= htmlspecialchars($projekt['title']) ?>" required />
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Popis</label>
                <textarea name="description" class="form-control custom-focus" rows="4" required><?= htmlspecialchars($projekt['description']) ?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" style="font-size: 12px; color: #888;">Obrázok</label>
                <?php if ($projekt['image']): ?>
                  <div class="mb-2">
                    <img src="../uploads/<?= htmlspecialchars($projekt['image']) ?>" style="height: 80px; border-radius: 6px;">
                  </div>
                <?php endif; ?>
                <input type="file" name="image" class="form-control custom-focus" accept="image/*" />
                <div class="form-text text-secondary" style="font-size: 11px;">Nechajte prázdne ak nechcete meniť obrázok.</div>
              </div>
              <div class="mb-4">
                <label class="form-label" style="font-size: 12px; color: #888;">URL</label>
                <input type="url" name="url" class="form-control custom-focus" value="<?= htmlspecialchars($projekt['url'] ?? '') ?>" placeholder="https://..." />
              </div>
              <button type="submit" class="btn btn-warning fw-bold w-100">Uložiť zmeny</button>
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