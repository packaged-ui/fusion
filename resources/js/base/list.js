window.Elegance = window.Elegance || {};
window.Elegance.List = window.Elegance.List || {};

(function (window, document, Elegance) {
  Elegance.List.SetActive = function (ele) {
    var eles = ele.parentElement.querySelectorAll('.list-item--active');
    for(var i in eles)
    {
      if(eles.hasOwnProperty(i) && eles[i] !== ele)
      {
        eles[i].classList.remove('list-item--active');
      }
    }
    ele.classList.add('list-item--active');
  };

  Elegance.on(
    document, 'click', '.list-item',
    function (e) {
      var ele = e.target;
      while((!ele.matches('.list-item')) && ele.parentElement)
      {
        ele = ele.parentElement;
      }
      Elegance.List.SetActive(ele);
    }
  );

}(window, document, window.Elegance));
