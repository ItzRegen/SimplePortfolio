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
    <link rel="stylesheet" href="css/style.css" />

    <!-- Custom font z googlu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
  <body class="bg-dark text-dark d-flex flex-column min-vh-100">

    <?php
      $file_path = "parts/header.php";
    if(!include($file_path)) {
        echo"Failed to include $file_path";
    } 
    ?>

    <!-- Úvod -->
    <section class="container py-6">
      <div class="row align-items-center text-center text-md-start">
        <div class="col-12 col-md-7 mb-3 mb-md-0 d-flex flex-column align-items-center align-items-md-start">
          <h2 class="fw-bold text-warning text-shadow-lg text-shadow-orange-500-50">Ahoj, ja som Adrián! 💻</h2>
          <p class="lead w-75 text-white">
            Designujem a nastavujem <span class="fw-bold">moderné web stránky</span>.
          </p>
        </div>
        <div class="col-6 col-md-5 d-flex justify-content-center justify-content-md-end mx-auto">
          <img
            src="img/adrian.png"
            alt="Adrián"
            width="400"
            class="img-fluid rounded-circle"
          />
        </div>
      </div>
    </section>

    <hr class="text-white container">

    <!-- Banner -->
    <section class="container d-flex justify-content-center align-items-center flex-column w-75 my-5" id="framework">
      <h1 class="text-white text-center fw-bold">Milujem Frameworky</h1>
      <p class="text-white text-center fw-bold">Miluj ich tiež.</p>
    </section>

    <!-- Tlačidlo -->
    <div class="container text-center pb-5">
      <a href="../about.html" class="btn btn-secondary">Prejsť na informácie o mne</a>
    </div>

    <!-- Footer -->
    <footer class="bg-warning bg-gradient text-white text-center py-4 mt-auto">
      <div class="container d-none d-md-flex flex-row justify-content-between mx-auto">
        <div class="col-md-3 mb-2">
          <h5 class="text-dark fw-bold text-start">O mne</h5>
          <p class="small text-dark text-start w-75">
            Som začínajúci web developer, ktorý sa zameriava na tvorbu moderných webových stránok.
          </p>
        </div>

        <nav class="d-flex flex-column">
          <a href="../" class="footer-link mx-2">Domov</a>
          <a href="../about.html" class="footer-link mx-2">O mne</a>
          <a href="../portfolio.html" class="footer-link mx-2">Portfólio</a>
          <a href="../contact.html" class="footer-link mx-2">Kontakt</a>
        </nav>

        <div class="col-md-3">
          <h5 class="text-dark fw-bold text-start">Kontakt</h5>
          <div class="small text-dark text-start">
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


    <!-- Kreatívny bod - Cookies lišta -->
    <div id="cookies" class="alert alert-dark d-none justify-content-between align-items-center fixed-bottom m-3 w-50 mx-auto" role="alert">
      <span>Tento web používa cookies.</span>
      <button id="okBtn" class="btn btn-warning btn-sm">OK</button>
    </div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>

    <!-- Import JavaScriptu kvôli cookies lište -->
    <script src="../js/app.js"></script>
  </body>
</html>