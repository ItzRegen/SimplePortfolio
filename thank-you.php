<!DOCTYPE html>
<html lang="sk">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web stránka Adriána Čiffáryho - jednoduché portfólio.">
    <meta name="keywords" content="web, web developer, web design, programovanie, portfólio, frontend">
    <meta name="author" content="Adrián Čiffáry">
    <title>Adrián Čiffáry</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />

    <!-- Custom CSS, pokiaľ je potreba -->
    <link rel="stylesheet" href="../css/style.css" />

    <!-- Import JavaScriptu kvôli validácii -->
    <script src="../js/app.js"></script>

    <!-- Custom font z googlu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">

    <?php
      $file_path = "parts/header.php";
    if(!include($file_path)) {
        echo"Failed to include $file_path";
    } 
    ?>

    <!-- Thank you -->
    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 col-10 text-center text-md-start col-md-12">
        <img src="../img/check.png" alt="" height="100" class="mb-4">
        <h2 class="text-white text-uppercase fw-bold">Ďakujeme</h2>
        <h4 class="text-white">Správa bola odoslaná a onedlho čakajte spätnú väzbu na zadanom maile.</h4>
    </div>

    <?php
      $file_path = "parts/footer.php";
    if(!include($file_path)) {
        echo"Failed to include $file_path";
    } 
    ?>

      <!-- Na mobile -->
      <div class="container d-flex d-md-none flex-column">
        <div class="mb-3">
          <h5 class="text-dark fw-bold text-start">O mne</h5>
          <p class="small text-dark text-start w-100">
            Som začínajúci web developer, ktorý sa zameriava na tvorbu moderných webových stránok.
          </p>
        </div>
        <div class="d-flex justify-content-between">
          <nav class="d-flex flex-column gap-2">
            <a href="../" class="footer-link">Domov</a>
            <a href="../about.html" class="footer-link">O mne</a>
            <a href="../portfolio.html" class="footer-link">Portfólio</a>
            <a href="../contact.html" class="footer-link">Kontakt</a>
          </nav>
          <div class="text-start">
            <h5 class="text-dark fw-bold mt-2">Kontakt</h5>
            <div class="small text-dark">
              <p class="mb-1">
                Mail: <a href="mailto:info@mojadomena.sk" class="text-white">adrian.ciffary@gmail.com</a>
              </p>
              <p class="mb-1">
                Instagram: <a href="https://www.instagram.com/ciffary.a" target="_blank" class="text-white">@ciffary.a</a>
              </p>
              <p class="mb-1">
                Tel. číslo: <a href="tel:+421948005764" class="text-white">+421 948 005 764</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      <p class="text-dark mb-0 mt-3">© 2025 Adrián Čiffáry</p>
    </footer>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>