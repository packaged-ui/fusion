import './toast-notification-container.scss';
import './toast-notification.scss';

// only run this code if the document contains a toast notification container
let container = document.querySelectorAll('.toast-notification-container');

if(container)
{
  container.forEach((e) => {
    let delay = parseInt(e.getAttribute('data-toast-notification-delay'));

    setTimeout(() => openToastNotificationContainer(e), delay);

    // Manage each individual toast
    let toasts = e.getElementsByClassName('toast-notification');

    for(let i = 0; i < toasts.length; i++)
    {
      let timeToShow = parseInt(toasts[i].getAttribute('data-toast-notification-time-to-show'));

      if(timeToShow !== 0)
      {
        setTimeout(() => closeToastNotification(toasts[i]), (timeToShow + delay));
      }

      if(toasts[i].classList.contains('toast-notification--removable'))
      {

        toasts[i].addEventListener('click', (e) => {
          e.preventDefault();
          const elem = e.target.closest('.toast-notification');
          closeToastNotification(elem);
        });

      }

    }

  });

  function openToastNotificationContainer(element) {
    element.classList.add('toast-notification-container--open');
  }

  function closeToastNotification(element) {
    element.classList.add('toast-notification--fade');
    setTimeout(() => {
      element.classList.add('toast-notification--hide');
    }, 500);
  }
}


