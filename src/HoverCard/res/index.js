export class HoverCard
{
  constructor(element, triggerElement, rootElement = document)
  {
    this.rootElement = rootElement;
    this.triggerElement = triggerElement;
    this.hoverCard = element;
  }

  static create(element, triggerElement, rootElement = document)
  {
    if(element instanceof HoverCard)
    {
      return element;
    }

    element = new this.prototype.constructor(element, triggerElement, rootElement);

    return element;
  }

  show()
  {
    this.hoverCard.classList.remove('hidden');
    this.calculatePosition();
  }

  calculatePosition()
  {
    let triggerRect = this.triggerElement.getBoundingClientRect();
    let hoverReact = this.hoverCard.getBoundingClientRect();
    let clientWidth = this.rootElement.body.clientWidth;

    let top = triggerRect.y > hoverReact.height;
    let left = triggerRect.x > hoverReact.width;
    let right = !left && clientWidth - (triggerRect.x + triggerRect.width + hoverReact.width) > 0;

    if(top)
    {
      this.hoverCard.style.top = (triggerRect.y - hoverReact.height) + 'px';
      this.hoverCard.style.left = triggerRect.x + 'px';
    }
    else if(left)
    {
      this.hoverCard.style.top = triggerRect.y + 'px';
      this.hoverCard.style.left = (triggerRect.x - hoverReact.width) + 'px';
    }
    else if(right)
    {
      this.hoverCard.style.top = triggerRect.y + 'px';
      this.hoverCard.style.left = (triggerRect.x + triggerRect.width) + 'px';
    }
    else
    {
      this.hoverCard.style.top = triggerRect.y + triggerRect.height + 'px';
      this.hoverCard.style.left = triggerRect.x + 'px';
    }
  }

  hide()
  {
    this.hoverCard.classList.add('hidden');
  }

  static init(rootElement = document)
  {
    rootElement.addEventListener('DOMContentLoaded', (e) =>
    {
      const hoverTargets = rootElement.querySelectorAll('[data-hover-card]');

      hoverTargets.forEach((element) =>
      {
        element.addEventListener('mouseover', (e) =>
        {
          const hoverTarget = e.target;
          if(hoverTarget)
          {
            e.preventDefault();
            HoverCard.getHoverCard(hoverTarget, rootElement).show();
          }
        });
        element.addEventListener('mouseleave', (e) =>
        {
          const hoverTarget = e.target;
          if(hoverTarget)
          {
            e.preventDefault();
            HoverCard.getHoverCard(hoverTarget, rootElement).hide();
          }
        });
      });
    });
  }

  static getHoverCard(hoverTarget, rootElement)
  {
    const hoverCardId = hoverTarget.getAttribute('data-hover-id');
    const hoverCard = rootElement.querySelector('[data-hover-card-id=' + hoverCardId + ']');
    if(!hoverCard)
    {
      console.error('Couldn\'t find hover card target with id: ' + hoverCardId);
      return;
    }

    return HoverCard.create(hoverCard, hoverTarget, rootElement);
  }
}
