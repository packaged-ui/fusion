import './modal.css';
import debounce from 'lodash.debounce';
import {on} from '../../Foundation/res';

export default class Modal
{
  constructor(element)
  {
    element._modal = this;

    this.modal = document.createElement('div');
    this.modal.classList.add('modal');

    this.wrapper = document.createElement('div');
    this.wrapper.classList.add('modal__wrapper');
    this.modal.appendChild(this.wrapper);

    if(element.matches('.modal__content'))
    {
      this.content = element;
    }
    else
    {
      this.content = document.createElement('div');
      this.content.classList.add('modal__content');
      this.appendChild(element);
    }

    if(element.hasAttribute('id'))
    {
      this.modal.setAttribute('id', element.getAttribute('id') + '--outer');
    }

    this.wrapper.appendChild(this.content);

    this.updatePosition();
  }

  appendChild(newChild)
  {
    this.content.appendChild(newChild);
    this._postUpdateContent();
  }

  clear()
  {
    while(this.content.firstChild)
    {
      this.content.removeChild(this.content.firstChild);
    }
    this._postUpdateContent();
  }

  hide()
  {
    if(document.body.contains(this.modal))
    {
      document.body.removeChild(this.modal);
      this._postUpdateContent();
    }
  }

  show()
  {
    if(!document.body.contains(this.modal))
    {
      // add to document
      document.body.append(this.modal);

      // calculate position
      this._postUpdateContent();
      window.addEventListener('resize', _getDebounceFn(this));
      window.addEventListener('orientationchange', _getDebounceFn(this));
    }
  }

  _postUpdateContent()
  {
    this.updatePosition();
  }

  updatePosition()
  {
    let maxHeight = Math.max(this.modal.clientHeight, window.innerHeight);
    this.wrapper.style.top = Math.max(0, (maxHeight / 3) - (this.wrapper.clientHeight / 2)) + 'px';
  }
}

function _getDebounceFn(modal)
{
  return debounce(modal.updatePosition.bind(modal), 100, {'maxWait': 250});
}

on(
  document, 'click', '[modal-launcher]',
  (e) =>
  {
    e.preventDefault();
    const launcher = e.delegateTarget;
    if(!launcher._modal)
    {
      const modalEle = document.getElementById(launcher.getAttribute('modal-launcher'));
      if(!modalEle)
      {
        console.error('No modal could be found with the id ' + e.delegateTarget.getAttribute('modal-launcher'));
        return;
      }
      launcher._modal = new Modal(modalEle);
    }
    launcher._modal.show();
  },
);

on(
  document, 'click', '[modal-closer]', (e) =>
  {
    e.preventDefault();
    let p = e.delegateTarget;

    do
    {
      if(p._modal)
      {
        p._modal.hide();
        return;
      }
    }
    while((p = p.parentNode));
  },
);

document.addEventListener(
  'keyup', e =>
  {
    if(e.key === 'Escape' || e.key === 'Esc' || e.keyCode === 27)
    {
      // find the last modal's closer
      const closer = document.querySelector('.modal:last-of-type .modal__content [modal-closer]');
      if(closer)
      {
        closer.closest('.modal__content')._modal.hide();
      }
    }
  },
);
