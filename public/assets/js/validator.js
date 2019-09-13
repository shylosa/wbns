var form = document.querySelector('.formWithValidation');
var formInput = $(form);
var mainTable = $('#main_table');

//Выбор всех валидируемых полей ввода
var fields = form.querySelectorAll('.field');

var formError;
var email = form.querySelector('#email');

//ВАЛИДАЦИЯ
form.addEventListener('submit', function (event) {
  event.preventDefault();
  removeValidation();
  formError = false;
  checkFields();
  checkEmail(email.value);
  if (!formError){
    $.ajax({
      type: formInput.attr('method'),
      url: formInput.attr('action'),
      data: formInput.serialize()})
      .done( function(data) {
        console.log(data);
        mainTable.html(data);
        formInput[0].reset();
        formInput.find('.error').remove();
      })
    //form.submit();
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

//Форма удаления записей
var formDelete = document.querySelectorAll('.form_delete');
var formDeleteObj = $(formDelete);
formDeleteObj.on('submit', function (event) {
  event.preventDefault();
  $.ajax({
    type: formDeleteObj.attr('method'),
    url: formDeleteObj.attr('action'),
    data: formDeleteObj.serialize()})
    .done( function(data) {
      mainTable.html(data);
  });
});

//Редирект для редактирования сообщений
var linkToEdit = document.querySelectorAll('.js-edit');
var linkToEditObj = $(linkToEdit);
linkToEditObj.on('click', function (event) {
  event.preventDefault();
  $.ajax({
    type: 'POST',
    url: $(this).attr('href'),
    data: $(this).serialize()})
    .done( function(data) {
      mainTable.html(data);
    });
});