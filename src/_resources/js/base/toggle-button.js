window.FusionUi = window.FusionUi || {};
window.FusionUi.Inputs = window.FusionUi.Inputs || {};

(function (window, document, FusionUi)
{
  FusionUi.on(
    document, 'click', '.toggle-button',
    function (e)
    {
      e.preventDefault();

      var button = e.delegateTarget;
      var checkedClasses = button.getAttribute('checked-class').split(' ');
      var checkEle = e.delegateTarget.querySelector('.toggle-button-checkbox');
      checkEle.checked = !checkEle.checked;
      if(checkEle.checked)
      {
        button.setAttribute('checked', '');
        if(checkedClasses.length)
        {
          button.classList.add.apply(button.classList, checkedClasses);
        }
      }
      else
      {
        button.removeAttribute('checked');
        if(checkedClasses.length)
        {
          button.classList.remove.apply(button.classList, checkedClasses);
        }
      }

      if('createEvent' in document)
      {
        var evt = document.createEvent('HTMLEvents');
        evt.initEvent('change', false, true);
        button.dispatchEvent(evt);
      }
    }
  );
}(window, document, window.FusionUi));
