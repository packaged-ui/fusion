import './toast-notification-container.scss';
import './toast-notification.scss';
import {on} from '../../Foundation/res';

// Manage each individual toast
document.querySelectorAll('.toast-notification').forEach(
  (toast) =>
  {
    let delay = toast.hasAttribute('data-toast-notification-delay')
      ? parseInt(toast.getAttribute('data-toast-notification-delay')) : -1;
    let timeToShow = parseInt(toast.getAttribute('data-toast-notification-time-to-show'));

    show(toast, delay, timeToShow);
  }
);

function _openToastNotificationContainer(element)
{
  element.classList.add('toast-notification--show');
}

function _closeToastNotification(element)
{
  element.classList.remove('toast-notification--show');
  setTimeout(
    () =>
    {
      const parent = element.parentElement;
      parent.removeChild(element);
      if(element.hasAttribute('data-persistent'))
      {
        parent.appendChild(element);
      }
    }, 500
  );
}

on(
  document, 'click', '.toast-notification--removable', (e) =>
  {
    e.preventDefault();
    _closeToastNotification(e.delegateTarget);
  }
);

export function show(element, delay, timeToShow)
{
  if(delay >= 0)
  {
    setTimeout(
      () =>
      {
        _openToastNotificationContainer(element);
        if(timeToShow > 0)
        {
          setTimeout(() => _closeToastNotification(element), (timeToShow));
        }
      }, delay
    );
  }
}

export function hide(element)
{
  _closeToastNotification(element);
}

export function addNotification(container, title, content, removable, color)
{
  const toastContainer = document.createElement('div');
  toastContainer.classList.add('toast-notification');

  if(removable)
  {
    toastContainer.classList.add('toast-notification--removable');
  }

  if(color)
  {
    toastContainer.classList.add('toast-notification--with-color', `bgc-${color}`, `brdrc-${color}`);
  }

  const toastContent = document.createElement('div');
  toastContent.classList.add('toast-notification__content');
  toastContainer.appendChild(toastContent);

  if(title)
  {
    const toastTitle = document.createElement('div');
    toastTitle.classList.add('toast-notification__title');
    toastTitle.innerText += title;

    toastContent.appendChild(toastTitle);
  }

  if(content)
  {
    const toastDescription = document.createElement('div');
    toastDescription.classList.add('toast-notification__description');
    toastDescription.innerText += content;

    toastContent.appendChild(toastDescription);
  }

  container.append(toastContainer);

  show(container, 0);
}
