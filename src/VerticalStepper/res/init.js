import './step-wrapper.scss';
import './step.scss';
import {onReadyState} from '@packaged-ui/ready-promise';

let _init = new WeakSet();

export function init(rootElement = document)
{
  if(_init.has(rootElement))
  {
    return;
  }
  _init.add(rootElement);

  onReadyState().then(() => {updateLastStep(rootElement);});
}

export function updateLastStep(rootElement)
{
  rootElement.querySelectorAll('.step-wrapper').forEach(
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
