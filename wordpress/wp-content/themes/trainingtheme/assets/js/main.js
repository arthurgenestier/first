var body = document.querySelector('body');

var switchThemeButton = document.querySelector('.switch-theme');

function switchTheme() {
  if (body.classList.contains('contrast')) {
    body.classList.remove('contrast');
    switchThemeButton.innerText = 'Thème sombre';
  } else {
    body.classList.add('contrast');
    switchThemeButton.innerText = 'Thème clair';
  }
}

switchThemeButton.addEventListener('click', switchTheme);
