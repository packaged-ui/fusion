window.FusionUi = window.FusionUi || {};
window.FusionUi.Inputs = window.FusionUi.Inputs || {};

(function (window, document, FusionUi)
{
  FusionUi.on(
    document, 'click', '.toggle-button',
    function (e)
    {
      var button = e.delegateTarget;
      var checkEle = e.delegateTarget.querySelector('.toggle-button-checkbox');
      checkEle.checked = !checkEle.checked;
      if(checkEle.checked)
      {
        button.setAttribute('checked', '');
        button.classList.add.apply(button.classList, button.getAttribute('checked-class').split(' '));
      }
      else
      {
        button.removeAttribute('checked');
        button.classList.remove.apply(button.classList, button.getAttribute('checked-class').split(' '));
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
