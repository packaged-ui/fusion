import './list.css';

export function SetActive(ele) {
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
  if(list)
  {
    let eles = list.querySelectorAll('.list__item--active');
    for(let i in eles)
    {
      if(eles.hasOwnProperty(i) && eles[i] !== ele)
      {
        eles[i].classList.remove('list__item--active');
      }
    }
    ele.classList.add('list__item--active');
  }
}
