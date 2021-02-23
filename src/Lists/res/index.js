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
  if(list)
  {
    list.querySelectorAll('.list__item--active').forEach(
      (cEle) =>
      {
        if(cEle !== ele)
        {
          cEle.classList.remove('list__item--active');
        }
      }
    );
    ele.classList.add('list__item--active');
  }
}
