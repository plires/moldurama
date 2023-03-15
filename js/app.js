$( document ).ready(function() {

  /* Cierra el seguidor de "Te llamamos ahora" */
  $('#cerrar-seguidor').on('click', function(){
    $('#seguidor').slideToggle('slow');
  });

  $('#cerrar-seguidor-tel').on('click', function(){
    $('#seguidor-tel').slideToggle('slow');
  });

	/*Efecto wow con scroll y animacion*/
  wow = new WOW(
    {
      animateClass: 'animated',
      offset:       100,
      callback:     function(box) {
        // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
      }
    }
  );
  wow.init();

});  