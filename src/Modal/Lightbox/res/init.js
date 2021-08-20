import {Modal} from '@packaged-ui/modal/src/index.js';
import {onReadyState} from '@packaged-ui/ready-promise';
import {on} from '../../../Foundation/res/events.js';

let _init = new WeakSet();

export function init(rootElement = document)
{
  Modal.init(rootElement);
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  // auto close
  let downTarget = null;
  on(
    rootElement, 'mousedown', '.modal.lightbox', (e) =>
    {
      downTarget = e.target;
    }
  );
  on(
    rootElement, 'mouseup', '.modal.lightbox', (e) =>
    {
      if(downTarget === e.target)
      {
        Modal.hide(e.target);
      }
      downTarget = null;
    }
  );
  on(
    rootElement, 'keyup', (e) =>
    {
      if(e.key === 'Escape' || e.key === 'Esc' || e.keyCode === 27)
      {
        // find the last modal's closer
        const closer = rootElement.querySelector('.modal:last-of-type .modal__content.lightbox');
        if(closer)
        {
          e.preventDefault();
          Modal.hide(closer);
        }
      }
    }
  );

  //Auto Launch
  onReadyState()
    .then(() => rootElement.querySelectorAll('.lightbox--auto-launch').forEach(lb => Modal.create(lb).show()));
}
