import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import './tooltip.scss';

tippy.setDefaultProps({
  popperOptions: {
    placement: 'auto'
  }
});

tippy('[data-tooltip]', {
  onShow(instance)
  {
    instance.popper.hidden = !instance.reference.dataset.tooltip;
    instance.setContent(instance.reference.dataset.tooltip);
    instance.setProps({
      placement: instance.reference.dataset.tooltipPosition
    });
  }
});
