<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: admin/dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login – Adrián Čiffáry</title>

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

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body class="bg-dark text-white d-flex align-items-center justify-content-center min-vh-100">

    <div class="col-11 col-sm-8 col-md-5 col-lg-4">
      <div class="card border border-secondary rounded-3 p-4 p-md-5" style="background-color: #00000048;">

        <h2 class="fw-bold text-center mb-1">Admin Prihlásenie</h2>
        <p class="text-center text-secondary small mb-4">Prihláste sa pre správu portfólia.</p>

        <?php if (isset($_GET['error'])): ?>
          <div class="alert alert-danger py-2 text-center mb-3" style="font-size: 13px;">
            Nesprávny email alebo heslo.
          </div>
        <?php endif; ?>

        <form method="post" action="db/login.php">

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              class="form-control custom-focus"
              placeholder="Zadajte svoj email"
              required
            />
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Heslo</label>
            <input
              type="password"
              id="password"
              name="password"
              class="form-control custom-focus"
              placeholder="Zadajte svoje heslo"
              required
            />
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-warning fw-bold">Prihlásiť sa</button>
          </div>

        </form>
        <div class="text-center mt-3">
          <a href="index.php" class="text-secondary small">← Späť na domovskú stránku</a>
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