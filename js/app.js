$(document).ready(function () {
  /* Cierra el seguidor de "Te llamamos ahora" */
  $('#cerrar-seguidor').on('click', function () {
    $('#seguidor').slideToggle('slow')
  })

  $('#cerrar-seguidor-tel').on('click', function () {
    $('#seguidor-tel').slideToggle('slow')
  })

  /*Efecto wow con scroll y animacion*/
  wow = new WOW({
    animateClass: 'animated',
    offset: 100,
    callback: function (box) {
      // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    },
  })
  wow.init()

  $('.dropdown-menu a.dropdown-toggle').on('mouseover', function (e) {
    if (!$(this).next().hasClass('show')) {
      $(this)
        .parents('.dropdown-menu')
        .first()
        .find('.show')
        .removeClass('show')
    }
    var $subMenu = $(this).next('.dropdown-menu')
    $subMenu.toggleClass('show')

    $(this)
      .parents('li.nav-item.dropdown.show')
      .on('hidden.bs.dropdown', function (e) {
        $('.dropdown-submenu .show').removeClass('show')
      })

    return false
  })
})
