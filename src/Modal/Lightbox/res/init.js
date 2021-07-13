import {init as initFoundation} from '../../../Foundation/res/init';
import {Modal} from '@packaged-ui/modal/src/index';
import {onReadyState} from '@packaged-ui/ready-promise';
import {on} from '../../../Foundation/res/events';

let _init = false;

export function init()
{
  Modal.init();
  initFoundation();
  if(_init)
  {
    return;
  }
  _init = true;

  // auto close
  let downTarget = null;
  on(
    document, 'mousedown', '.modal', (e) =>
    {
      if(e.target.matches('.modal'))
      {
        downTarget = e.target;
      }
    }
  );
  on(
    document, 'mouseup', '.modal', (e) =>
    {
      if(downTarget === e.target)
      {
        const content = e.delegateTarget.querySelector('.modal__content.lightbox');
        if(content)
        {
          Modal.hide(content);
        }
      }
    }
  );
  on(
    document, 'keyup', (e) =>
    {
      if(e.key === 'Escape' || e.key === 'Esc' || e.keyCode === 27)
      {
        // find the last modal's closer
        const closer = document.querySelector('.modal:last-of-type .modal__content.lightbox');
        if(closer)
        {
          e.preventDefault();
          Modal.hide(closer);
        }
      }
    }
  );

  //Auto Launch
  onReadyState().then(() => document.querySelectorAll('.lightbox--auto-launch').forEach(lb => Modal.create(lb).show()));
}
