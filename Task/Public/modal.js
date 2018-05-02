let modal = document.getElementById('modal'),
    submit = document.getElementById('submit'),
    modalCancel = document.getElementsByClassName('modal-btn-cancel')[0];

submit.addEventListener('click', function () {
  let name = document.getElementsByClassName("form-control")[0],
      email = document.getElementsByClassName("form-control")[1],
      text = document.getElementsByClassName("form-control")[2],
      modalNameSpan = document.getElementsByClassName('name_span')[0],
      modalEmailSpan = document.getElementsByClassName('email_span')[0],
      modalTxtSpan = document.getElementsByClassName('txt_span')[0],
      nameVal = name.value,
      emailVal = email.value,
      txtVal = text.value;

      modal.setAttribute('style', 'display: block');

      modalNameSpan.innerText = nameVal;
      modalEmailSpan.innerText = emailVal;
      modalTxtSpan.innerText = txtVal;
});

modalCancel.onclick = function () {
  modal.setAttribute('style', 'z-index:-1;display: none;');
}