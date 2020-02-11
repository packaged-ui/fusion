import {on} from '../../../Foundation/res';

on(
  document, 'click', '.modal', (e) =>
  {
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
