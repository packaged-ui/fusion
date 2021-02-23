import './toast-notification-container.scss';
import './toast-notification.scss';
import {on} from '../../Foundation/res';

// Manage each individual toast
document.querySelectorAll('.toast-notification').forEach(
  (toast) =>
  {
    let timeToShow = parseInt(toast.getAttribute('data-toast-notification-time-to-show'));
    let delay = parseInt(toast.getAttribute('data-toast-notification-delay'));

    setTimeout(() => _openToastNotificationContainer(toast), delay);

    if(timeToShow !== 0)
    {
      setTimeout(() => _closeToastNotification(toast), (timeToShow + delay));
    }
  }
);

function _openToastNotificationContainer(element)
{
  element.classList.add('toast-notification--show');
}

function _closeToastNotification(element)
{
  element.classList.add('toast-notification--fade');
  setTimeout(
    () =>
    {
      element.classList.add('toast-notification--hide');
    },
    500
  );
}

on(
  document, 'click', '.toast-notification--removable', (e) =>
  {
    e.preventDefault();
    _closeToastNotification(e.delegateTarget);
  }
);
