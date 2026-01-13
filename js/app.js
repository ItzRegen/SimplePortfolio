document.addEventListener("DOMContentLoaded", function () {

  // Formulár
  const form = document.getElementById('kontaktForm');
  if (form) {
    form.addEventListener('submit', function(e) {
      e.preventDefault();

      const meno = document.getElementById('meno').value.trim();
      const email = document.getElementById('email').value.trim();
      const sprava = document.getElementById('sprava').value.trim();

      // ALERT
      if (!meno || !email || !sprava) {
        alert('Prosím, vyplňte všetky polia.');
        return;
      }

      window.location.href = '/thank-you.html';
    });
  }
  
  // Kreatívny bod - Cookies lišta
  const cookiesDiv = document.getElementById("cookies");
  const okBtn = document.getElementById("okBtn");

  if (cookiesDiv && okBtn) {
    if (localStorage.getItem("cookiesAccepted") !== "yes") {
      cookiesDiv.classList.remove("d-none");
      cookiesDiv.classList.add("d-flex");
    }

    okBtn.addEventListener("click", function () {
      cookiesDiv.classList.add("d-none");
      cookiesDiv.classList.remove("d-flex");
      localStorage.setItem("cookiesAccepted", "yes");
    });
}

});
