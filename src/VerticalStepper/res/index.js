import './step-wrapper.scss';
import './step.scss';
import {Pagelets} from '@packaged-ui/pagelets';
import {onReady} from '../../Foundation/res';

onReady((e) =>
{
  setLastStep();
});

document.addEventListener(Pagelets.events.COMPLETE, (e) =>
{
  setLastStep();
});

function setLastStep()
{
  const stepWrapper = document.querySelectorAll('.step-wrapper');

  stepWrapper.forEach((elem, i) =>
  {
    let steps = elem.childNodes;

    if (!steps)
    {
      return;
    }

    const length = steps.length - 1;
    // If the last element doesnt contain anything and doesn't have a .step

    if (!steps[length].hasChildNodes()
        && !steps[length].classList.contains('step'))
    {
      steps[length - 1].classList.add('step--last');
    }
  });
}
