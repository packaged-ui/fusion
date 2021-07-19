import chai from 'chai';
import chaiAsPromised from 'chai-as-promised';
import {on} from '../src/Foundation/res/events.js';

chai.use(chaiAsPromised);

describe(
  'events', function ()
  {
    const eventName = 'test-event';

    it(
      'on - no matching selector', function (done)
      {
        const {target} = _getElements();
        const check = Math.random();
        let fired = false;
        on(
          target, eventName, '.wrong-class', function ()
          {
            fired = true;
            done('event fired, but should not have');
          }
        );
        _dispatch(target, eventName, check);
        setTimeout(() => fired || done(), 500);
      }
    );

    it(
      'on - no selector', function (done)
      {
        const {target} = _getElements();
        const check = Math.random();
        on(
          target, eventName, function (e)
          {
            if(e.detail === check)
            {
              done();
            }
            else
            {
              done('event fired, but failed check');
            }
          }
        );
        _dispatch(target, eventName, check);
      }
    );

    it(
      'on - target', function (done)
      {
        const {target} = _getElements();
        const successClass = 'do-it';
        const check = Math.random();
        target.classList.add(successClass);
        on(
          target, eventName, '.' + successClass, function (e)
          {
            if(e.detail === check)
            {
              done();
            }
            else
            {
              done('event fired, but failed check');
            }
          }
        );
        _dispatch(target, eventName, check);
      }
    );

    it(
      'on - intermediate', function (done)
      {
        const {intermediate, target} = _getElements();
        const successClass = 'do-it';
        const check = Math.random();
        target.classList.add(successClass);
        on(
          intermediate, eventName, '.' + successClass, function (e)
          {
            if(e.detail === check)
            {
              done();
            }
            else
            {
              done('event fired, but failed check');
            }
          }
        );
        _dispatch(target, eventName, check);
      }
    );

    it(
      'on - delegate', function (done)
      {
        const {delegate, target} = _getElements();
        const successClass = 'do-it';
        const check = Math.random();
        target.classList.add(successClass);
        on(
          delegate, eventName, '.' + successClass, function (e)
          {
            if(e.detail === check)
            {
              done();
            }
            else
            {
              done('event fired, but failed check');
            }
          }
        );
        _dispatch(target, eventName, check);
      }
    );
  }
);

function _getElements()
{
  const delegate = document.createElement('div');
  const intermediate = document.createElement('div');
  delegate.append(intermediate);
  const target = document.createElement('div');
  intermediate.append(target);
  return {delegate, intermediate, target};
}

function _dispatch(ele, eventName, detail)
{
  return ele.dispatchEvent(
    new CustomEvent(eventName, {bubbles: true, cancelable: true, composed: true, detail})
  );
}
