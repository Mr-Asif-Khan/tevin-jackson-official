(function($){
    $('.header__nav-button').click(function(){
      $('body').toggleClass('open-menu');
      $('.header_actions').toggleClass('open');
    });
  
    var mode = $(window).innerWidth() >= 992 ? "PC" : "MOBILE";
    if(mode == "MOBILE") {
      $('.menu-item > a').click(function(){
        $(this).toggleClass('open');
        $(this).next('.sub-menu').toggle(500);
      });
    }
  
    window.addEventListener("scroll", function() {
      var header = document.getElementById("header");
      header.classList.toggle("fixed-header", window.scrollY > 10);
    });
  
    $('.mk-search-trigger').click(function(){
      $('.search-panel').addClass('search-panel-show');
    });
  
    $('.search-close').click(function(){
      $('.search-panel').removeClass('search-panel-show');
    });
  
    $('.page-overlay').click(function(){
      $('body').removeClass('open-menu');
      $('.menu').removeClass('open');
    });
  
    $('.bg-img').each(function(){
      var _Bg = 'url('+ $(this).find('img').attr('src') + ')';
      $(this).css("background-image", _Bg).find('img').hide();
    }); 
  
    document.addEventListener('DOMContentLoaded', function() {
      new Splide('#splide', {
        type: 'loop', 
        perPage: 6, 
        arrows: false, 
        focus: 'center', 
        autoplay: true,
        interval: 2000, 
        flickMaxPages: 3, 
        updateOnMove: true, 
        pagination: false,
        padding: '0%', 
        throttle: 300,
        breakpoints: { 767: { perPage: 1, padding: '30%' } 
      }
      }).mount();
      var loader = document.getElementById("circle-loader-wrap");
  
      splide.on('move', function () {
          loader.classList.add("rotate");
          setTimeout(() => {
              loader.classList.remove("rotate");
          }, 1800);
      });
    });
  
    var btn = $('#button-top');
    $(window).scroll(function() {
      btn.toggleClass('show', $(window).scrollTop() > 300);
    });
    
    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop: 0}, '300');
    });
  
    AOS.init();
  })(jQuery);