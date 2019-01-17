function setLoading(target) {
  var loading = $('<h3></h3>').attr({'class': 'text-center'})
  var img = $('<img />').attr({'src': main_url+"/img/load.svg"})
  img.appendTo(loading)
  target.html(loading)
}

// ********************* ONLOAD PAGE ******************** //
$(document).ready(function(){
  $(".data").mask("99/99/9999");
})

jQuery.validator.setDefaults({
  errorPlacement: function (error, element) {
    if(element.parents('form').hasClass('form-inline'))
      error.attr('hidden','hidden');
    element.parents('.form-group').append(error);
  },

  highlight: function(element, errorClass, validClass){
    var icon  = '<div class="input-group-append check-icon"><span class="input-group-text"><i class="fa fa-exclamation validate-icon" aria-hidden="true" style="color:#f44336"></i></span></div>';
    $(element).addClass(errorClass)
    $(element).parents('.form-group').find('label.error').remove();
    $(element).parents('.input-group').find('.check-icon').remove();

    if($(element).parents('form').hasClass('form-inline')){
      $(icon).insertAfter($(element));
    }else{
      $(element).parents('.input-group').append(icon);
    }
  },

  success: function(label){
    label.parents('.form-group').find('.input-group').find('.check-icon').remove();
    label.parents('.form-group').find('label.error').remove();
  },

  onfocusout: function(element) {
    this.element(element);
  },
});
