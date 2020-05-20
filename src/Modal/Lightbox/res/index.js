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

onReady(() => {
  let lbs = document.body.getElementsByClassName('lightbox--auto-launch');
  [...lbs].forEach(lb => {
    let m = new Modal(lb);
    m.show();
  })
});
