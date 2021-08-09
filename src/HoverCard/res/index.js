export class HoverCard
{
  constructor(element, triggerElement, rootElement = document)
  {
    if(element instanceof Node && element.matches('.hover-card'))
    {
      this.content = element;
    }
    else
    {
      const container = rootElement.createElement('div');
      let id = 'hover-' + Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);

      container.classList.add('hover-card');
      container.classList.add('hidden');
      container.innerHTML = element;
      container.id = id;
      container.setAttribute('data-hover-card-id', id);

      triggerElement.setAttribute('data-hover-card', true);
      triggerElement.setAttribute('data-hover-id', id);

      rootElement.body.appendChild(container);
      this.content = container;
    }

    this.rootElement = rootElement;
    this.triggerElement = triggerElement;
    this.hoverCard = this.content;
  }

  static create(element, triggerElement, rootElement = document)
  {
    if(element instanceof HoverCard)
    {
      return element;
    }

    element = new this.prototype.constructor(element, triggerElement, rootElement);
    this.eventListeners(rootElement);
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
    let right = clientWidth - (triggerRect.x + triggerRect.width + hoverReact.width) > 0;
    let left = !right && triggerRect.x > hoverReact.width;

    if(top)
    {
      this.hoverCard.style.top = (triggerRect.y - hoverReact.height) + 'px';
      this.hoverCard.style.left = triggerRect.x + 'px';
    }
    else if(right)
    {
      this.hoverCard.style.top = triggerRect.y + 'px';
      this.hoverCard.style.left = (triggerRect.x + triggerRect.width) + 'px';
    }
    else if(left)
    {
      this.hoverCard.style.top = triggerRect.y + 'px';
      this.hoverCard.style.left = (triggerRect.x - hoverReact.width) + 'px';
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

  static eventListeners(rootElement)
  {
    const hoverTargets = rootElement.querySelectorAll('[data-hover-card]');

    hoverTargets.forEach((element) =>
    {
      if(element.getAttribute('data-hover-card') !== 'loaded')
      {
        element.setAttribute('data-hover-card', 'loaded');
        element.addEventListener('mouseover', (e) =>
        {
          const hoverTarget = e.target;
          if(hoverTarget)
          {
            e.preventDefault();
            let h = HoverCard.getHoverCard(hoverTarget, rootElement);
            if(h)
            {
              h.show();
            }
          }
        });
        element.addEventListener('mouseleave', (e) =>
        {
          const hoverTarget = e.target;
          if(hoverTarget)
          {
            e.preventDefault();
            let h = HoverCard.getHoverCard(hoverTarget, rootElement);
            if(h)
            {
              h.hide();
            }
          }
        });
      }
    });
  }

  static init(rootElement = document)
  {
    rootElement.addEventListener('DOMContentLoaded', (e) =>
    {
      this.eventListeners(rootElement);
    });
  }

  static getHoverCard(hoverTarget, rootElement)
  {
    const hoverCardId = hoverTarget.getAttribute('data-hover-id');
    const hoverCard = rootElement.querySelector('[data-hover-card-id=' + hoverCardId + ']');
    if(!hoverCard)
    {
      return;
    }

    return HoverCard.create(hoverCard, hoverTarget, rootElement);
  }
}
