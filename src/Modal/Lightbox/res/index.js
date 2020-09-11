import {on, onReady} from '../../../Foundation/res';
import Modal from '@packaged-ui/modal';

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
onReady(() => document.querySelectorAll('.lightbox--auto-launch').forEach(lb => Modal.create(lb).show()));
