const _elements = new Map();
const _triggers = new Map();

export class HoverCard
{
  constructor(content, triggerElement, id = null, rootElement = document)
  {
    if(content instanceof Node && content.matches('.hover-card'))
    {
      this.content = content;
    }
    else
    {
      const container = document.createElement('div');

      if(!id)
      {
        id = 'hover-' + Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 5);
      }

      container.classList.add('hover-card');
      container.classList.add('hidden');
      container.append(content);
      container.id = id;
      container.setAttribute('data-hover-card-id', id);

      triggerElement.setAttribute('data-hover-id', id);

      rootElement.body.appendChild(container);
      this.content = container;
    }

    this.rootElement = rootElement;
    this.hoverCard = this.content;
  }

  static create(content, triggerElement, id = null, rootElement = document)
  {
    if(content instanceof HoverCard)
    {
      return content;
    }

    if(!_elements.has(content))
    {
      const hoverCard = new this.prototype.constructor(content, triggerElement, id, rootElement);
      _elements.set(content, hoverCard);
    }

    if(!_triggers.has(triggerElement))
    {
      this.addEventListeners(triggerElement, rootElement);
    }

    return _elements.get(content);
  }

  // on init get the triggers, and create models based of the page content, if they exist.
  static init(rootElement = document)
  {
    const hoverTriggers = rootElement.querySelectorAll('[data-hover-id]');

    hoverTriggers.forEach((hoverTrigger) =>
    {
      this.addEventListeners(hoverTrigger, rootElement);
    });
  }

  static addEventListeners(triggerElement, rootElement = document)
  {
    // triggerElement has already been initialised
    if(!_triggers.has(triggerElement))
    {
      triggerElement.addEventListener('mouseover', (e) =>
      {
        e.preventDefault();
        this.mouseOverEvent(e.target, triggerElement, rootElement);
      });

      triggerElement.addEventListener('mouseleave', (e) =>
      {
        e.preventDefault();
        this.mouseLeaveEvent(e.target, rootElement);
      });

      _triggers.set(triggerElement, true);
    }
  }

  static mouseOverEvent(hoverTarget, triggerElement, rootElement = document)
  {
    let hoverCard = HoverCard.getHoverCard(hoverTarget, rootElement);
    if(hoverCard)
    {
      hoverCard.show(triggerElement);
    }

  }

  static mouseLeaveEvent(hoverTarget, rootElement = document)
  {
    let hoverCard = HoverCard.getHoverCard(hoverTarget, rootElement);
    if(hoverCard)
    {
      hoverCard.hide();
    }
  }

  static getHoverCard(hoverTarget, rootElement = document)
  {
    const hoverCardId = hoverTarget.getAttribute('data-hover-id');
    const hoverCard = rootElement.querySelector('[data-hover-card-id=' + hoverCardId + ']');
    if(!hoverCard)
    {
      return;
    }

    return HoverCard.create(hoverCard, hoverTarget, rootElement);
  }

  show(triggerElement)
  {
    this.hoverCard.classList.remove('hidden');
    this.calculatePosition(triggerElement);
  }

  hide()
  {
    this.hoverCard.classList.add('hidden');
  }

  calculatePosition(triggerElement)
  {
    if(triggerElement)
    {
      let triggerRect = triggerElement.getBoundingClientRect();
      let hoverReact = this.hoverCard.getBoundingClientRect();
      let clientWidth = this.rootElement.body.clientWidth;

      let top = triggerRect.y > hoverReact.height;
      let right = clientWidth - (triggerRect.x + triggerRect.width + hoverReact.width) > 0;
      let left = !right && triggerRect.x > hoverReact.width;

      if(top)
      {
        this.hoverCard.style.top = (triggerRect.y - hoverReact.height) - 10 + 'px';
        this.hoverCard.style.left = triggerRect.x + 'px';
      }
      else if(right)
      {
        this.hoverCard.style.top = triggerRect.y + 'px';
        this.hoverCard.style.left = (triggerRect.x + triggerRect.width) + 10 + 'px';
      }
      else if(left)
      {
        this.hoverCard.style.top = triggerRect.y + 'px';
        this.hoverCard.style.left = (triggerRect.x - hoverReact.width) - 10 + 'px';
      }
      else
      {
        this.hoverCard.style.top = triggerRect.y + triggerRect.height + 10 + 'px';
        this.hoverCard.style.left = triggerRect.x + 'px';
      }
    }
  }
}
