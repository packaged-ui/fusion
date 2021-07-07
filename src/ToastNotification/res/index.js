import './toast-notification-container.scss';
import './toast-notification.scss';
import {on} from '../../Foundation/res/events.js';

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

on(
  document, 'click', '.toast-notification--removable', (e) =>
  {
    e.preventDefault();
    hide(e.delegateTarget);
  }
);

export function show(toastElement, delay = 0, timeToShow = 0)
{
  if(delay >= 0)
  {
    setTimeout(
      () =>
      {
        toastElement.classList.add('toast-notification--show');
        // prevent flickering when fading out
        toastElement.style.animationPlayState = null;
        toastElement.style.opacity = '1';
        toastElement.style.display = null;
        if(timeToShow > 0)
        {
          setTimeout(() => hide(toastElement), (timeToShow));
        }
      }, delay
    );
  }
}

on(
  document, 'animationend', '.toast-notification',
  (e) =>
  {
    const toastElement = e.delegateTarget;
    if(toastElement && e.animationName === 'fade-out')
    {
      toastElement.style.animationPlayState = null;
      toastElement.style.opacity = null;
      if(toastElement.hasAttribute('data-persistent'))
      {
        toastElement.style.display = 'none';
      }
      else if(toastElement.parentElement)
      {
        toastElement.parentElement.removeChild(toastElement);
      }
    }
  }
);

export function hide(toastElement)
{
  toastElement.classList.remove('toast-notification--show');
  toastElement.style.animationPlayState = 'running';
}

export function addNotification(toastContainer, title, content, removable, color)
{
  const toastNotification = document.createElement('div');
  toastNotification.classList.add('toast-notification');

  if(removable)
  {
    toastNotification.classList.add('toast-notification--removable');
  }

  if(color)
  {
    toastNotification.classList.add('toast-notification--with-color', `bgc-${color}`, `brdrc-${color}`);
  }

  const toastContent = document.createElement('div');
  toastContent.classList.add('toast-notification__content');
  toastNotification.appendChild(toastContent);

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

  toastContainer.append(toastNotification);

  return toastNotification;
}
