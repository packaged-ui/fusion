import {on, onReady} from '../../../Foundation/res';
import Modal from '../../res';

on(
  document, 'click', '.modal', (e) => {
    if(e.target.matches('.modal'))
    {
      const content = e.delegateTarget.querySelector('.modal__content.lightbox');
      if(content)
      {
        content._modal.hide();
      }
    }
  },
);

//Auto Launch
onReady(() => document.querySelectorAll('.lightbox--auto-launch').forEach(lb => Modal.create(lb).show()));
