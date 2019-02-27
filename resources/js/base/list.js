(function (window, document) {

  window.Elegance.on(
    document, 'click', '.list-item',
    function (e) {
      var ele = e.target;
      while((!ele.matches('.list-item')) && ele.parentElement)
      {
        ele = ele.parentElement;
      }
      var eles = ele.parentElement.querySelectorAll('.list-item--active');
      for(var i in eles)
      {
        if(eles.hasOwnProperty(i) && eles[i] !== e.target)
        {
          eles[i].classList.remove('list-item--active');
        }
      }
      ele.classList.add('list-item--active');
    }
  );

}(window, document));
