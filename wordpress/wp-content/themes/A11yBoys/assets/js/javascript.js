/* mobile menu */
var nav = document.querySelector('#main-navbar')
var menuButton = document.querySelector('#main-menu-button');
var mobileMenu = document.querySelector('#main-nav--mobile'); 
/* desktop menu */
var desktopMenu = document.querySelector('#main-nav--desktop')

// Détecter la largeur de la fenêtre et faire apparaître/disparaître le bouton Menu mobile
window.onresize = function() {
  if (window.innerWidth < 600) {
    desktopMenu.style.display = 'none';
    menuButton.style.display = 'flex';
    nav.style.marginTop = '-8rem';
  } else {
    mobileMenu.style.display = "none";
    menuButton.style.display = "none";
    nav.style.marginTop = "0";
    desktopMenu.style.display = "flex";

  }
}
window.onresize();

// show or hide
menuButton.addEventListener('click',function() {
  menuButton.blur()
  if (mobileMenu.style.display === 'flex') {
    mobileMenu.style.display = 'none';
  } else {
    mobileMenu.style.display = 'flex';
  }
});

// When the user scrolls the page, execute myFunction
window.onscroll = function() {
  myFunction()
};

// Get the header
var header = document.getElementById("header");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
} 



// Fan club form
function check(input) {
  if (input.value != document.getElementById('email_addr').value) {
    input.setCustomValidity('Les deux adresses e-mail ne correspondent pas.');
  } else {
    // le champ est valide : on réinitialise le message d'erreur
    input.setCustomValidity('');
  }
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
