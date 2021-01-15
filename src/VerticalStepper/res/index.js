import './step-wrapper.scss';
import './step.scss';
import {Pagelets} from '@packaged-ui/pagelets';
import {onReady} from '../../Foundation/res';

onReady(setLastStep());

document.addEventListener(
  Pagelets.events.COMPLETE, (e) =>
  {
    if(e.detail.request.getResolvedTarget.querySelector('.step-wrapper'))
    {
      setLastStep();
    }
  }
);

function setLastStep()
{
  document.querySelectorAll('.step-wrapper').forEach(
    (stepWrapper) =>
    {
      stepWrapper.querySelectorAll('.step').forEach(
        (step, i) =>
        {
          step.classList.toggle('step--last', i === steps.length - 1);
        }
      );
    }
  );
}
