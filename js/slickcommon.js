$('.slide').slick({
    arrows: false,
    accessibility: true,
    autoplay: true,
    autoplaySpeed: 0,
    cssEase: 'linear',
    speed: 4000,
    slidesToShow: 4,
    slidesToScroll: 1,
  responsive: [{
    breakpoint: 896,
    settings:{
      slidesToShow: 3,
    }
  }]
});
