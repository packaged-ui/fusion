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
  element.classList.remove('toast-notification--show');
  setTimeout(() =>
  {
    const parent = element.parentElement;
    parent.removeChild(element);
    if(element.hasAttribute('data-persistent'))
    {
      parent.appendChild(element);
    }
  }, 500);
}

on(
  document, 'click', '.toast-notification--removable', (e) =>
  {
    e.preventDefault();
    _closeToastNotification(e.delegateTarget);
  }
);

export function addNotification(container, title, content, removable, color)
{
  const toastContainer = document.createElement('div');
  toastContainer.classList.add('toast-notification');

  if(removable)
  {
    toastContainer.classList.add('toast-notification--removable');
  }

  if(!color)
  {
    color = 'blue';
  }

  toastContainer.classList.add('toast-notification--with-color');
  toastContainer.classList.add(`bgc-${color}`);
  toastContainer.classList.add(`brdrc-${color}`);

  const toastContent = document.createElement('div');
  toastContent.classList.add('toast-notification__content');
  toastContainer.appendChild(toastContent);

  if(title)
  {
    const toastTitle = document.createElement('div');
    toastTitle.classList.add('toast-notification__title');
    toastTitle.innerHTML += title;

    toastContent.appendChild(toastTitle);
  }

  if(content)
  {
    const toastDescription = document.createElement('div');
    toastDescription.classList.add('toast-notification__description');
    toastDescription.innerHTML += content;

    toastContent.appendChild(toastDescription);
  }

  container.append(toastContainer);

  setTimeout(() =>
  {
    toastContainer.classList.add('toast-notification--show');
  }, 1);
}
