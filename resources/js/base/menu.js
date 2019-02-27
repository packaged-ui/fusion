(function (window, document) {

  window.Elegance.on(
    document, 'click', '.menu-item',
    function (e) {
      var ele = e.target;
      while((!ele.matches('.menu-item')) && ele.parentElement)
      {
        ele = ele.parentElement;
      }
      var eles = ele.parentElement.querySelectorAll('.menu-item--active');
      for(var i in eles)
      {
        if(eles.hasOwnProperty(i) && eles[i] !== e.target)
        {
          eles[i].classList.remove('menu-item--active');
        }
      }
      ele.classList.add('menu-item--active');
    }
  );

}(window, document));
