import './step-wrapper.scss';
import './step.scss';
import {Pagelets} from '@packaged-ui/pagelets';
import {onReady} from '../../Foundation/res';

onReady((e) => {
  setLastStep();
});

document.addEventListener(Pagelets.events.COMPLETE, (e) => {
  setLastStep();
});

function setLastStep() {
  const stepWrappers = document.querySelectorAll('.step-wrapper');

  stepWrappers.forEach((stepWrapper, i) => {

    let steps = stepWrapper.querySelectorAll('.step');

    if(!steps)
    {
      return;
    }

    steps[steps.length - 1].classList.add('step--last');

  });
}
