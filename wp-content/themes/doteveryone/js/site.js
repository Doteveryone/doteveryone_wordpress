jQuery( document ).ready(function() {
  jQuery('#related_post_carousel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: true,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false
        }
      }
    ]
  });
  jQuery('#blog_post_carousel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: true,
    adaptiveHeight: true,
    responsive: [
      {
        breakpoint: 990,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: false
        }
      }
    ]
  });
  jQuery('.headshot').hover(function() {
    jQuery( this ).find('.overlay').fadeIn( 500 );
  },
  function(){
    jQuery( this ).find('.overlay').fadeOut();
  }
  );
  jQuery('.menu-toggle').click(function() {
    jQuery('#primary-menu').slideToggle();
  });
});

