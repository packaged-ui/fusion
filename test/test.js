import chai from 'chai';
import chaiAsPromised from 'chai-as-promised';
import chaiSpies from 'chai-spies';
import {on} from '../src/Foundation/res/events.js';

chai.use(chaiAsPromised);
chai.use(chaiSpies);

describe(
  'events', function ()
  {
    const eventName = 'test-event';

    it(
      'on - no matching selector', function ()
      {
        const {target} = _getElements();
        const _fn = _getSpy();
        on(target, eventName, '.wrong-class', _fn);
        _dispatch(target, eventName);
        chai.expect(_fn).to.not.have.been.called();
      }
    );

    it(
      'on - no selector (target)', function ()
      {
        const {target} = _getElements();
        const _fn = _getSpy();
        on(target, eventName, _fn);
        _dispatch(target, eventName);
        chai.expect(_fn).to.have.been.called();
      }
    );

    it(
      'on - no selector (intermediate)', function ()
      {
        const {intermediate, target} = _getElements();
        const _fn = _getSpy();
        on(intermediate, eventName, _fn);
        _dispatch(target, eventName);
        chai.expect(_fn).to.have.been.called();
      }
    );

    it(
      'on - no selector (delegate)', function ()
      {
        const {delegate, target} = _getElements();
        const _fn = _getSpy();
        on(delegate, eventName, _fn);
        _dispatch(target, eventName);
        chai.expect(_fn).to.have.been.called();
      }
    );

    it(
      'on - no selector (document)', function ()
      {
        const {target} = _getElements();
        const _fn = _getSpy();
        on(document, eventName, _fn);
        _dispatch(target, eventName);
        chai.expect(_fn).to.have.been.called();
      }
    );

    it(
      'on - selector (target)', function ()
      {
        const {target} = _getElements();
        const successClass = 'do-it';
        target.classList.add(successClass);
        const _fn1 = _getSpy();
        const _fn2 = _getSpy();
        on(target, eventName, '.' + successClass, _fn1);
        on(target, eventName, '.nope', _fn2);
        _dispatch(target, eventName);
        chai.expect(_fn1).to.have.been.called();
        chai.expect(_fn2).to.not.have.been.called();
      }
    );

    it(
      'on - selector (intermediate)', function ()
      {
        const {intermediate, target} = _getElements();
        const successClass = 'do-it';
        const _fn1 = _getSpy();
        const _fn2 = _getSpy();
        target.classList.add(successClass);
        on(intermediate, eventName, '.' + successClass, _fn1);
        on(intermediate, eventName, '.nope', _fn2);
        _dispatch(target, eventName);
        chai.expect(_fn1).to.have.been.called();
        chai.expect(_fn2).to.not.have.been.called();
      }
    );

    it(
      'on - selector (delegate)', function ()
      {
        const {delegate, target} = _getElements();
        const successClass = 'do-it';
        const _fn1 = _getSpy();
        const _fn2 = _getSpy();
        target.classList.add(successClass);
        on(delegate, eventName, '.' + successClass, _fn1);
        on(delegate, eventName, '.nope', _fn2);
        _dispatch(target, eventName);
        chai.expect(_fn1).to.have.been.called();
        chai.expect(_fn2).to.not.have.been.called();
      }
    );

    it(
      'on - selector (traversal stops at listener)', function ()
      {
        const {delegate, intermediate, target} = _getElements();
        const successClass = 'do-it';
        const _fn1 = _getSpy();
        delegate.classList.add(successClass);
        on(intermediate, eventName, '.' + successClass, _fn1);
        _dispatch(target, eventName);
        chai.expect(_fn1).to.not.have.been.called();
      }
    );

    it(
      'on - selector (document)', function ()
      {
        const {target} = _getElements();
        const successClass = 'do-it';
        const _fn1 = _getSpy();
        const _fn2 = _getSpy();
        target.classList.add(successClass);
        on(document, eventName, '.' + successClass, _fn1);
        on(document, eventName, '.nope', _fn2);
        _dispatch(target, eventName);
        chai.expect(_fn1).to.have.been.called();
        chai.expect(_fn2).to.not.have.been.called();
      }
    );

    it(
      'on - cancel', function ()
      {
        const {delegate, target} = _getElements();
        const _fn = _getSpy();
        const cancel = on(delegate, eventName, _fn);
        cancel();
        _dispatch(target, eventName);
        chai.expect(_fn).to.not.have.been.called();
      }
    );
  }
);

function _getSpy()
{
  return chai.spy(function (e) {});
}

function _getElements()
{
  const delegate = document.createElement('div');
  const intermediate = document.createElement('div');
  const target = document.createElement('div');

  document.body.append(delegate);
  delegate.append(intermediate);
  intermediate.append(target);

  return {delegate, intermediate, target};
}

function _dispatch(ele, eventName, detail)
{
  return ele.dispatchEvent(
    new CustomEvent(eventName, {bubbles: true, cancelable: true, composed: true, detail})
  );
}
