$(window).on('load resize', function() {
  var windowWidth = window.innerWidth;
  var elements = $('header');//position: sticky;を指定している要素
  if (windowWidth >= 768) {/*768px以上にIE用のJSをきかせる*/
    Stickyfill.add(elements);
  }else{
    Stickyfill.remove(elements);
  }
});
