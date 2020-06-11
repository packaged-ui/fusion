import './modal.css';
import debounce from 'lodash.debounce';
import {on} from '../../Foundation/res';

export default class Modal
{
  static create(element)
  {
    if(!element['_fusion_modal'])
    {
      element['_fusion_modal'] = new this.prototype.constructor(...arguments);
    }
    return element['_fusion_modal'];
  }

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
    return this;
  }

  clear()
  {
    while(this.content.firstChild)
    {
      this.content.removeChild(this.content.firstChild);
    }
    this._postUpdateContent();
    return this;
  }

  hide()
  {
    if(document.body.contains(this.modal))
    {
      document.body.removeChild(this.modal);
      this._postUpdateContent();
    }
    return this;
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
    return this;
  }

  _postUpdateContent()
  {
    this.updatePosition();
  }

  updatePosition()
  {
    const maxHeight = Math.max(this.modal.clientHeight, window.innerHeight);
    const surplus = Math.max(0, maxHeight - this.wrapper.clientHeight);
    this.wrapper.style.top = (surplus / 3) + 'px';
    return this;
  }
}

function _getDebounceFn(modal)
{
  return debounce(modal.updatePosition.bind(modal), 100, {'maxWait': 250});
}

const _modals = {};

on(
  document, 'click', '[modal-launcher]',
  (e) =>
  {
    e.preventDefault();
    const launcher = e.delegateTarget;
    if(!launcher._modal)
    {
      const modalId = launcher.getAttribute('modal-launcher');
      if(_modals.hasOwnProperty(modalId))
      {
        // lookup in launched modals
        launcher._modal = _modals[modalId];
      }
      else
      {
        // lookup by element id
        const modalEle = document.getElementById(modalId);
        if(!modalEle)
        {
          console.error('No modal could be found with the id ' + e.delegateTarget.getAttribute('modal-launcher'));
          return;
        }
        _modals[modalId] = launcher._modal = Modal.create(modalEle);
      }
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
