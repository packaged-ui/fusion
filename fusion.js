import * as Foundation from './src/Foundation/res/init';
import * as Events from './src/Foundation/res/events';
import * as imports from './_imports';

export const FusionUi = Object.assign({}, {Foundation, Events}, imports);

FusionUi.init = function (rootElement = document)
{
  Object.keys(FusionUi).forEach(
    (k) =>
    {
      if(FusionUi[k].init)
      {
        FusionUi[k].init(rootElement);
      }
    }
  );
};
