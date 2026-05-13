(function ($) {
  'use strict';

  /* ========================================================================= */
  /*	Page Preloader
  /* ========================================================================= */

  // window.load = function () {
  // 	document.getElementById('preloader').style.display = 'none';
  // }

  $(window).on('load', function () {
    $('#preloader').fadeOut('slow', function () {
      $(this).remove();
    });
  });

  
  //Hero Slider
  $('.hero-slider').slick({
    autoplay: true,
    infinite: true,
    arrows: true,
    prevArrow: '<button type=\'button\' class=\'prevArrow\'></button>',
    nextArrow: '<button type=\'button\' class=\'nextArrow\'></button>',
    dots: false,
    autoplaySpeed: 7000,
    pauseOnFocus: false,
    pauseOnHover: false
  });
  $('.hero-slider').slickAnimation();


  /* ========================================================================= */
  /*	Header Scroll Background Change
  /* ========================================================================= */

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    //console.log(scroll);
    if (scroll > 200) {
      //console.log('a');
      $('.navigation').addClass('sticky-header');
    } else {
      //console.log('a');
      $('.navigation').removeClass('sticky-header');
    }
  });

  /* ========================================================================= */
  /*	Portfolio Filtering Hook
  /* =========================================================================  */

    // filter
    setTimeout(function(){
      var containerEl = document.querySelector('.filtr-container');
      var filterizd;
      if (containerEl) {
        filterizd = $('.filtr-container').filterizr({});
      }
    }, 500);

  /* ========================================================================= */
  /*	Testimonial Carousel
  /* =========================================================================  */

  //Init the slider
  $('.testimonial-slider').slick({
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000
  });


  /* ========================================================================= */
  /*	Clients Slider Carousel
  /* =========================================================================  */

  //Init the slider
  $('.clients-logo-slider').slick({
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1
  });




  /* ========================================================================= */
  /*	Company Slider Carousel
  /* =========================================================================  */
  $('.company-gallery').slick({
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1
  });


  /* ========================================================================= */
  /*   Contact Form Validating
  /* ========================================================================= */

  $('#contact-form').validate({
      rules: {
        name: {
          required: true,
          minlength: 4
        },
        email: {
          required: true,
          email: true
        },
        subject: {
          required: false
        },
        message: {
          required: true
        }
      },
      messages: {
        user_name: {
          required: 'Come on, you have a name don\'t you?',
          minlength: 'Your name must consist of at least 2 characters'
        },
        email: {
          required: 'Please put your email address'
        },
        message: {
          required: 'Put some messages here?',
          minlength: 'Your name must consist of at least 2 characters'
        }
      },
      submitHandler: function (form) {
        $(form).ajaxSubmit({
          type: 'POST',
          data: $(form).serialize(),
          url: 'sendmail.php',
          success: function () {
            $('#contact-form #success').fadeIn();
          },
          error: function () {
            $('#contact-form #error').fadeIn();
          }
        });
      }
    }

  );

  /* ========================================================================= */
  /*	On scroll fade/bounce effect
  /* ========================================================================= */
  var scroll = new SmoothScroll('a[href*="#"]');

  // -----------------------------
  //  Count Up
  // -----------------------------
  function counter() {
    if ($('.counter').length !== 0) {
      var oTop = $('.counter').offset().top - window.innerHeight;
    }
    if ($(window).scrollTop() > oTop) {
      $('.counter').each(function () {
        var $this = $(this),
          countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        }, {
          duration: 1000,
          easing: 'swing',
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
          }
        });
      });
    }
  }
  // -----------------------------
  //  On Scroll
  // -----------------------------
  $(window).scroll(function () {
    counter();
  });

})(jQuery);


//PERMITE HABILITAR CAMPOS PARA RELLENAR//
var inputa = document.getElementById('inputa');
function carga(elemento) {
  d = elemento.value; 
  if(d == "Otros"){
    inputa.disabled = false;
  }else{
    inputa.disabled = true;
  }
}
var inpute = document.getElementById('inpute');
function carge(elemento) {
  d = elemento.value; 
  if(d == "Otros"){
    inpute.disabled = false;
  }else{
    inpute.disabled = true;
  }
}

var inputi = document.getElementById('inputi');
function cargi(elemento) {
  d = elemento.value;
  if(d == "Otros"){
    inputi.disabled = false;
  }else{
    inputi.disabled = true;
  }
}

// Codigo para validar ingreso de solo numeros
function valideKey(evt){
    var code = (evt.which) ? evt.which : evt.keyCode;    // code is the decimal ASCII representation of the pressed key.
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } 
    else if (code==46){
      return true;
    }
    else{ // other keys.
      return false;
    }
}

// Codigo para validar ingreso de solo digitos permitidos
function valideKeys(evt){
  var code = (evt.which) ? evt.which : evt.keyCode;    // code is the decimal ASCII representation of the pressed key.
  if(code==95||code==91||code==93||code==42||code==36) { // underline, corchetes , asterisco, dollars
    return false;
  } 
  else{ // other keys.
    return true;
  }
}



//----------------MENSAJE DE CONFIRMACION---------------------//
function confirmar ( mensaje ) {
return confirm( mensaje );
}

//----------------CALCULO DE LOS EQUIPOS---------------------//
function suma() {
  var add = 0;
  $('.cl').each(function() {
      if (!isNaN($(this).val())) {
          add += Number($(this).val());
      }
  });
  $('#sumAll').val(add);
};

//-----------------------resta de valores -------------------------//

var valor_inicial = $('#Inventario').val();

$( document ).ready(function() {
    $('.Can_Produc').keyup(function () {
        var valor = parseInt(valor_inicial);
        var valor_restar = 0;
        $('.Can_Produc').each(function () {
          if ($(this).val() > 0) {
            valor_restar += parseInt($(this).val());
          }
        });
            
        $('#Inventario').val(valor - valor_restar);
              
    });
});

//----------------copiar un input en otro-------------//
