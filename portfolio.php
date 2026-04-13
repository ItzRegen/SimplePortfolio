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
  <body class="bg-dark text-white">

    <?php
      $file_path = "parts/header.php";
    if(!include($file_path)) {
        echo"Failed to include $file_path";
    } 
    ?>

    <!-- Moje projekty -->
    <section id="projects" class="container py-6 justify-content-center align-items-center text-center mx-auto">
      <h1 class="fw-bold">Moje projekty</h1>
      <!-- Slideshow (Carousel) -->
      <div id="carouselExampleIndicators" class="carousel slide mx-auto mt-4 border" data-bs-ride="carousel">

        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/porfolio.png" class="d-block w-100" alt="Portfolio">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fw-bold text-shadow-lg text-shadow-orange-500-50">Portfólio</h5>
              <p>Jednoduchá web stránka vytvorená pomocou HTML, CSS, Bootstrap a JS.</p>
            </div>
          </div>

          <div class="carousel-item">
            <a href="https://badhub.cz" target="_blank">
              <img src="img/badhub.png" class="d-block w-100" alt="BadHub.cz">
            </a>
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fw-bold text-shadow-lg text-shadow-orange-500-50">BadHub.cz</h5>
              <p>Moderná a dynamická web stránka s vlastným obchodom pomocou frameworku Laravel pre môj herný server.</p>
            </div>
          </div>

          <div class="carousel-item">
            <a href="https://majokraft.com" target="_blank">
              <img src="img/majokraft.png" class="d-block w-100" alt="Majokraft.com">
            </a>
            <div class="carousel-caption d-none d-md-block">
              <h5 class="fw-bold text-shadow-lg text-shadow-orange-500-50">Majokraft.com</h5>
              <p>Moderná a dynamická web stránka s vlastným obchodom pomocou frameworku Laravel.</p>
            </div>
          </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Predchádzajúca</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Ďalšia</span>
        </button>
      </div>
    </section>

    <!-- Info -->
    <div class="container d-flex flex-column justify-content-center text-start py-3 mx-auto">
        <h2 class="fw-bold text-warning">Info</h2>
        <p class="col-10 col-md-6">
          Projekty <span class="fw-bold">BadHub.cz</span> a <span class="fw-bold">Majokraft.com</span> boli tvorené spoločne s mojim kolegom, ktorý má priviedol k webom
          a má viacero skúseností. Ja som sa staral hlavne o designovú stránku spoločne s responzivitou a dynamickým panelom.
        </p>
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
            <a href="index.php" class="footer-link">Domov</a>
            <a href="about.php" class="footer-link">O mne</a>
            <a href="portfolio.php" class="footer-link">Portfólio</a>
            <a href="contact.php" class="footer-link">Kontakt</a>
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