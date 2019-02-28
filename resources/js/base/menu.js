window.Elegance = window.Elegance || {};

(function (window, document, Elegance) {

  function updateActiveMenu(url) {
    var eles = document.querySelectorAll('.menu-item[href="' + url + '"]');
    for(var i in eles)
    {
      if(eles.hasOwnProperty(i))
      {
        Elegance.List.SetActive(eles[i]);
      }
    }
  }

  updateActiveMenu(window.location.pathname);
  window.addEventListener('popstate', function () {updateActiveMenu(window.location.pathname);});

}(window, document, window.Elegance));
