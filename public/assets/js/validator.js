var form = document.querySelector('.formWithValidation');

//Выбор всех валидируемых полей ввода
var fields = form.querySelectorAll('.field');

var formError;
var email = document.getElementById('email');

form.addEventListener('submit', function (event) {
  event.preventDefault();
  removeValidation();
  formError = false;
  checkFields();
  checkEmail(email.value);
  if (!formError){
     form.submit();
  }
});

window.onload = fadeMessages;

//Очистка документа от старых сообщений валидатора
var removeValidation = function () {
  var errors = form.querySelectorAll('.error');

  for (var i = 0; i < errors.length; i++) {
    errors[i].remove()
  }
};

//Проверка полей на заполнение
var checkFields = function () {
  for (var i = 0; i < fields.length; i++) {
    if (!fields[i].value) {
      //console.log('field is blank', fields[i])
      formError = true;
      var error = generateError('Заполните это поле');
      form[i].parentElement.insertBefore(error, fields[i])
    }
  }
};

//Генерация сообщения об ошибке
var generateError = function (text) {
  var error = document.createElement('div');
  error.className = 'error';
  error.style.color = 'red';
  error.innerHTML = text;
  return error;
};

//Валидация email
function checkEmail(address) {
  var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  var reg = re.test(address);
  if(!reg){
    formError = true;
    var error = generateError('Введите корректный email');
    email.parentElement.insertBefore(error, email);
  }
}

//Скрытие информационных сообщений
function fadeMessages(){
  $('.alert').delay(1000).fadeOut(1000);
}
