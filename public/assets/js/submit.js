$(function(){
  $('#input_form').on('submit', function (event) {

    let mainTable = $('#main_table');
    let inputForm = $('#input_form');
    inputForm.find('.error').remove();
    inputForm.removeClass('was-validated');
    event.preventDefault();

    $.ajax({
      type: inputForm.attr('method'),
      url: inputForm.attr('action'),
      data: inputForm.serialize()})
      .done( function(data) {
        console.log(data);
        mainTable.html(data);
        inputForm[0].reset();
        inputForm.find('.error').remove();
      })
    /*.fail(function(jqXHR, textStatus, errorThrown) {
      let $field, fieldName, $feedback;

      inputForm.addClass('was-validated');

      for (fieldName in jqXHR.responseJSON) {
        $field = $('[name*="[' + fieldName + ']"]');
        $feedback = $('<div class="invalid-feedback"></div>');
        $feedback.html(jqXHR.responseJSON[fieldName]);
        $field.parent().append($feedback);
      }*/
    });
  });
//});