window.FusionUi = window.FusionUi || {};
window.FusionUi.List = window.FusionUi.List || {};

(function (window, document, FusionUi) {
  FusionUi.List.SetActive = function (ele) {
    // find top list
    var list;
    var t = ele;
    do
    {
      if(t.matches('.list-box'))
      {
        list = t;
      }
    }
    while((t = t.parentElement));

    var eles = list.querySelectorAll('.list-item--active');
    for(var i in eles)
    {
      if(eles.hasOwnProperty(i) && eles[i] !== ele)
      {
        eles[i].classList.remove('list-item--active');
      }
    }
    ele.classList.add('list-item--active');
  };

  FusionUi.on(
    document, 'click', '.list-item',
    function (e) {
      var ele = e.target;
      while((!ele.matches('.list-item')) && ele.parentElement)
      {
        ele = ele.parentElement;
      }
      FusionUi.List.SetActive(ele);
    }
  );

}(window, document, window.FusionUi));
