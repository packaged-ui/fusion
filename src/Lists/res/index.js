import {on} from '../../Foundation/res';
import './list.css';

export function SetActive(ele)
{
  // find top list
  let list;
  let t = ele;
  do
  {
    if(t.matches('.list-box'))
    {
      list = t;
    }
  }
  while((t = t.parentElement));

  let eles = list.querySelectorAll('.list-item--active');
  for(let i in eles)
  {
    if(eles.hasOwnProperty(i) && eles[i] !== ele)
    {
      eles[i].classList.remove('list-item--active');
    }
  }
  ele.classList.add('list-item--active');
}

on(
  document, 'click', '.list-item',
  function (e)
  {
    let ele = e.target;
    while((!ele.matches('.list-item')) && ele.parentElement)
    {
      ele = ele.parentElement;
    }
    SetActive(ele);
  },
);

