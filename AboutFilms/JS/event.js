let deleteFilm = document.getElementsByClassName('del_film')[0],
    moadalDeleteFilm = document.getElementsByClassName('modal_addFilm')[0],
    closeModalWindow = document.getElementsByClassName('modal_addFilm-p')[0],
    smallNav = document.getElementsByClassName('small-navigation')[0],
    mainNav = document.getElementsByClassName('navigation')[0];

deleteFilm.onclick = function (event) {
  event.preventDefault();
  moadalDeleteFilm.style.display = 'block';
  event.stopPropagation();
}

closeModalWindow.onclick = function () {
  moadalDeleteFilm.style.display = 'none';
}

smallNav.onclick = function (event) {
  mainNav.style.display = 'block';
  event.stopPropagation();
}

window.onclick = function () {
  if (document.documentElement.clientWidth+15<500) {
    mainNav.style.display = 'none';
  }
}