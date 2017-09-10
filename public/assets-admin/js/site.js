
// Call & init
$(document).ready(function(){

  $('#view-slider').each(function(){
    var cur = $(this);
    var width = cur.width()+'px';
    drags(cur.find('#handle'), cur.find('.resize'), cur);
  });

  $('.select-lang .lang').on('click',function(){
    $('.select-lang ul').toggleClass('active');
    $(this).toggleClass('active')
  });

  $('.content-popup-country figure a').on('click', function() {
      close_popup();
      close_popup_slider();
      close_popup_country();
  });

    // quantity controls
    $('.quantity-controls a').on('click',function(){

        var up_down = $(this).attr('class');
        var input_element = $(this).parent().find('input');
        var input_value = input_element.val();

        if(up_down == 'up'){
            input_value++;
        } else if (up_down == 'down') {
            input_value--;
        }
        if(input_value < 1 && $(this).parent().attr('data-can-be-zero') != 1){
            input_value = 1;
        }
        if(input_value < 0 && $(this).parent().attr('data-can-be-zero') == 1){
            input_value = 0;
        }
        input_element.val(input_value);

        var $price = $('#order-step-1').find('.total-price span');

        var after = $price.data('currency_after');
        var symbol = $price.data('currency_symbol');
        var price = $price.data('price');
        $price.text(
            after ?
            (((price * input_value).toFixed(2)).concat(symbol)) :
            (symbol.concat((price * input_value).toFixed(2)))
        );
    });

    $('.content-popup-country a').on('click', function() {
        close_popup();
        close_popup_slider();
        close_popup_country();
    });

    $(window).on('ajaxStart', function() {
        $('.loader').show();
    });

    $(window).on('ajaxStop', function() {
        if (! $(document.activeElement).hasClass('finish-btn')) {
            $('.loader').hide();
        }
    });

    $('#order-step-1').on('click', '.continue-btn', function(e) {
        e.preventDefault();

        var $form = $('#order-step-1').find('form');
        $.ajax({
            method: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function() {
                $('#order-nav-step-1').removeClass('active');
                $('#order-nav-step-2').addClass('active');
                $('#order-step-1').removeClass('active');
                $('#order-step-2').addClass('active');

                $('.input-hidden-product-quantity').remove();
                var product_id = $form.find('input[name="product_id"]').val();
                var quantity = $form.find('input[name="quantity"]').val();
                $('#order-step-2').find('form').prepend(
                    $('<input />')
                        .attr('type', 'hidden')
                        .attr('name', 'product_quantity[' + product_id + ']')
                        .attr('value', quantity)
                        .addClass('input-hidden-product-quantity')
                );
            }
        });
    });

    $('#order-step-2').on('click', '.continue-btn', function(e) {
        e.preventDefault();

        var $form = $('#order-step-2').find('form');
        $.ajax({
            method: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(html) {
                $('#order-nav-step-2').removeClass('active');
                $('#order-nav-step-3').addClass('active');
                $('#order-step-2').removeClass('active');
                $('#order-step-3').addClass('active');

                $('#order-step-3').html(html);
            }
        });
    }).on('click', '.back-btn', function(e) {
        e.preventDefault();

        var $form = $('#order-step-2').find('form');

        $.ajax({
            method: $form.attr('method'),
            url: $(this).data('url'),
            data: $form.serialize(),
            success: function() {
                $('#order-nav-step-2').removeClass('active');
                $('#order-nav-step-1').addClass('active');
                $('#order-step-2').removeClass('active');
                $('#order-step-1').addClass('active');
            }
        });
    });

    $('#order-step-3').on('click', '.continue-btn', function(e) {
        e.preventDefault();

        var $form = $('#order-step-3').find('form');
        $.ajax({
            method: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            success: function(response) {
                //loader
                var $form = $('<form />');
                $form.attr('method', response.method)
                    .attr('action', response.url);
                $form.find(':input').remove();
                for (var i in response.data) {
                    $form.append($('<input />').attr('type', 'hidden')
                        .attr('name', i).val(response.data[i])
                    );
                }
                $('body').append($form);
                $form.trigger('submit');
            }
        });
    }).on('click', '.back-btn', function(e) {
        e.preventDefault();

        var $form = $('#order-step-3').find('form');

        $.ajax({
            method: $form.attr('method'),
            url: $(this).data('url'),
            data: $form.serialize(),
            success: function() {
                $('#order-nav-step-3').removeClass('active');
                $('#order-nav-step-2').addClass('active');
                $('#order-step-3').removeClass('active');
                $('#order-step-2').addClass('active');
            }
        });
    });
});

$(window).resize(function(){
  $('#view-slider').each(function(){
    var cur = $(this);
    var width = cur.width()+'px';
  });
});
var blocksLength = 75;

function drags(dragElement, resizeElement, container){
  
  dragElement.on('touchstart mousedown', function(e){

    dragElement.addClass('draggable');
    $('#output').addClass('dragable');


    var startX = (e.pageX) ? e.pageX : e.originalEvent.touches[0].pageX;

    var dragWidth = dragElement.outerWidth(),
      posX = dragElement.offset().left + dragWidth - startX,
      containerOffset = container.offset().left,
      containerWidth = container.outerWidth();

    minLeft = containerOffset;
    maxLeft = containerOffset + containerWidth - dragWidth;
    
    dragElement.parents().on("mousemove touchmove", function(e){

      var moveX;

      if (e.originalEvent.touches && e.originalEvent.touches.length){
        moveX = e.originalEvent.touches[0].pageX
      } else {
        moveX = e.pageX;
      }

      leftValue = moveX + posX - dragWidth;

      if ( leftValue < minLeft){
        leftValue = minLeft;
      } else if (leftValue > maxLeft){
        leftValue = maxLeft;
      }

      widthValue = Math.round(((leftValue + dragWidth/2 - containerOffset) * 100 / containerWidth)) + '%';
      currentValue = Math.max(((leftValue + dragWidth/2 - containerOffset) * blocksLength / containerWidth).toFixed(0));

      $('#output.dragable div').removeClass('active');
      $('#output.dragable #img-'+ currentValue +'').addClass('active');
      $('#handle.draggable').css('left', widthValue);
      
    }).on('mouseup touchend touchcancel', function(){
  
      dragElement.removeClass('draggable');
      $('#output').removeClass('dragable');
      
    });
    
    e.preventDefault();
    
  }).on('mouseup touchend touchcancel', function(e){
    
    dragElement.removeClass('draggable');
    $('#output').removeClass('dragable');
  });
}

var imageFolder = 'web/images/item-slider/',
imageColor = '';

$(".cell-2 .choose-color a").on('click', function(e){

  $('.cell-2 .choose-color a').removeClass('active');
  $(this).addClass('active');

  imageColor = $(this).prop('class').replace(' active', '');

  $('#view-slider #output img').each(function () {
      imageName = $(this).attr('alt');
      $(this).attr('src', imageFolder+imageColor+'/'+imageName);
  });

});

function close_popup(){
    $('.popup-overlay, .content-popup').removeClass('show');
}
function close_popup_slider(){
  $('.popup-overlay-slider, .content-popup-slider').removeClass('show');
}
function close_popup_country(){
  $('.popup-overlay-country, .content-popup-country').removeClass('show');
}
$(document).ready(function(){

  $('.menu').on('click', function(){
  	$('.menu span').toggleClass('active-menu');
  	$('#header').toggleClass('active');
  });


//Masonry grid
if($('.grid').lenght > 0){
  $('.grid').masonry({
    itemSelector: '.grid-item',
    columnWidth: '.grid-sizer',
    isResizeBound: true,
    percentPosition: true,
    isAnimated: true,
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    }
  });
}

//Scroll to top button
$(".to-top").click(function(){

  // Animate the scrolling motion.
  $("html, body").animate({
    scrollTop:0
  },"slow");
});

//respimage
function loadJS(u){var r = document.getElementsByTagName( "script" )[ 0 ], s = document.createElement( "script" );s.src = u;r.parentNode.insertBefore( s, r );}

if(!window.HTMLPictureElement){
  document.createElement('picture');
  loadJS("web/js/respimage.min.js");
}

//Popup homepage

//show popup buy
$(document).on('click', ".buy-button" , function() {

  $('.popup-overlay').addClass('show');
  //$('.content-popup').show()
  $('.content-popup').addClass('show');

});
//show popup country
$(document).on('click', ".select-country a" , function(event) {
  event.preventDefault();
  $('.popup-overlay-country , .content-popup-country').addClass('show');
});

//close popup
$(document).on('click', ".close-button" , function(event) {
  event.preventDefault();
  close_popup();
  close_popup_slider();
  close_popup_country();
});

$(document).on('click', '.popup-overlay', function(e){
  if (!$(e.target).closest($(".content-popup")).length) {
    close_popup();
  }
});
$(document).on('click', '.popup-overlay-slider', function(e){
  if (!$(e.target).closest($(".content-popup-slider")).length) {
    close_popup_slider();
  }
});
$(document).on('click', '.popup-overlay-country', function(e){
  if (!$(e.target).closest($(".content-popup-country")).length) {
    close_popup_country();
  }
});
$(document).on('keydown',function(e){
  if (e.keyCode === 27){
    close_popup();
    close_popup_slider();
    close_popup_country();
  }
});

if(!Modernizr.csstransforms){
  $('.content-popup').css('margin-left', - $('.content-popup').width() / 2);

  $(window).on('resize', function(){
    $('.content-popup').css('margin-left', - $('.content-popup').width() / 2);
  });
  $('.content-popup-slider').css('margin-left', - $('.content-popup-slider').width() / 2);

  $(window).on('resize', function(){
    $('.content-popup-slider').css('margin-left', - $('.content-popup-slider').width() / 2);
  });

}

});
//Message form
function IsEmail(email) {
    var regex = new RegExp(/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
}
$('#register-form').submit(function() {
    var $this = $(this);
    var errors = false,
        email = $("#email").val(),
        name = $("#name").val(),
        subject = $("#subject").val(),
        message = $("#message").val();

    $("#register-form :input[type=text]").map(function(){
        if(!$(this).val()) {
           $(this).addClass('incorrect-input');
           errors = true;
        } else if ($(this).val()) {
           $(this).removeClass('incorrect-input');
        }   
    });
    if(IsEmail(email) === false) {
      $("#register-form #email").addClass('incorrect-input');
      errors = true;
    }
    if(!subject) {
      $("#register-form textarea").addClass('incorrect-input');
      errors = true;
    } else {
      $("#register-form textarea").removeClass('incorrect-input');
    }
    if(errors){
      $('.success').hide();
      $('.error').show();
    } else {
      $('.error').hide();
      $.ajax({
          type: $this.attr('method'),
          url:  $this.attr('action'),
          data: $this.serialize(),
          success: function(){
            $('.error').hide();
            $('.success').show();
          },
          error: function(){
            $('.success').hide();
            $('.error').show();
          }
      });
    }

    return false;
});
//Scroll buy button
$(window).scroll(function() {

    if ($(this).scrollTop()>200){
        $('.buy-button .buy-text').addClass('hide-text');
     }
    else{
      $('.buy-button .buy-text').removeClass('hide-text');
     }
 });

