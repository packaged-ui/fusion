import './step-wrapper.scss';

const stepWrapper = document.querySelectorAll('.step-wrapper');

if(stepWrapper)
{
  stepWrapper.forEach((e) => {
    let steps = e.querySelectorAll('.step');
    console.log('steps: ', steps);
    steps[0].classList.add('step--first');
    steps[steps.length - 1].classList.add('step--last');
  })
}
