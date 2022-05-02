$(function() {
    $('.btn_to_form').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 350
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});

// Inicializa Wow
new WOW().init();

// Validacion del Formulario
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

/* Cierra el seguidor de "Te llamamos ahora" */
$('#cerrar-seguidor').on('click', function(){
  $('#seguidor').slideToggle('slow');
});

$('#cerrar-seguidor-tel').on('click', function(){
  $('#seguidor-tel').slideToggle('slow');
});