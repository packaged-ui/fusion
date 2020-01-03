window.FusionUi = window.FusionUi || {};
window.FusionUi.Tabs = window.FusionUi.Tabs || {};

(function (window, document, FusionUi) {
  FusionUi.Tabs.SetActive = function (ele, tabID) {
    // find top tabContainer
    var tabContainer;
    var t = ele;
    do
    {
      if(t.matches('.tabs'))
      {
        tabContainer = t;
      }
    }
    while((t = t.parentElement));
    var tab = tabContainer.querySelectorAll('#' + tabID)[0];

    function removeClass(removeClass) {
      var eles = tabContainer.querySelectorAll('.' + removeClass);
      for(var i in eles)
      {
        if(eles.hasOwnProperty(i) && eles[i] !== ele)
        {
          eles[i].classList.remove(removeClass);
        }
      }
    }

    removeClass('tab_label--active');
    removeClass('tab--active');

    ele.classList.add('tab_label--active');
    tab.classList.add('tab--active');

    var activeEvent = new Event("tab.active");
    tab.dispatchEvent(activeEvent);
  };

  FusionUi.on(
    document, 'click', '.tab_label',
    function (e) {
      var ele = e.target;
      while((!ele.matches('.tab_label')) && ele.parentElement)
      {
        ele = ele.parentElement;
      }
      FusionUi.Tabs.SetActive(ele, ele.getAttribute('data-tab-id'));
    }
  );

  //Set the correct active tab from the url fragment
  if(window.location.hash.startsWith("#f-tb-"))
  {
    var tabID = window.location.hash.substring(1);
    var label = document.querySelectorAll("[data-tab-id='" + tabID + "']");
    for(var i in label)
    {
      if(label.hasOwnProperty(i))
      {
        FusionUi.Tabs.SetActive(label[i], tabID);
      }
    }
  }

}(window, document, window.FusionUi));
