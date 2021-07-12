import './step-wrapper.scss';
import './step.scss';
import {onReadyState} from '@packaged-ui/ready-promise';
import {Pagelets} from '@packaged-ui/pagelets';
import {init as initFoundation} from '../../Foundation/res/init';

let _init = false;

export function init()
{
  initFoundation();
  if(_init)
  {
    return;
  }
  _init = true;

  onReadyState().then(setLastStep);
  document.addEventListener(Pagelets.events.COMPLETE, setLastStep);

  function setLastStep()
  {
    document.querySelectorAll('.step-wrapper').forEach(
      (stepWrapper) =>
      {
        const steps = stepWrapper.querySelectorAll('.step');
        steps.forEach(
          (step, i) =>
          {
            step.classList.toggle('step--last', i === steps.length - 1);
          }
        );
      }
    );
  }
}
