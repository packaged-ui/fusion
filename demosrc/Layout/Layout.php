<?php
namespace PackagedUi\FusionDemo\Layout;

use Packaged\Context\ContextAware;
use Packaged\Context\ContextAwareTrait;
use Packaged\Event\Events\CustomEvent;
use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Element;
use PackagedUi\Fusion\Layout\Drawer\Drawer;
use PackagedUi\Fusion\LayoutInterface;
use PackagedUi\Fusion\Menu\Menu;
use PackagedUi\Fusion\Menu\MenuItem;
use PackagedUi\FusionDemo\UiContext;

class Layout extends Element implements ContextAware
{
  use ContextAwareTrait;

  const RENDER_EVENT = "fusion.ui.layout.render";

  protected $_content = [];

  public function render(): string
  {
    $this->getContext()->events()->trigger(new CustomEvent(self::RENDER_EVENT));
    return parent::render();
  }

  public function setContent($content)
  {
    $this->_content = $content;
    return $this;
  }

  public function getContent()
  {
    return Drawer::create($this->buildMenu())
      ->setAppContent(Div::create($this->_content)->addClass(LayoutInterface::PADDING_MEDIUM))
      ->setOpen(true)
      ->setState(Drawer::STATE_PERMANENT);
  }

  public function buildMenu()
  {
    $items = [];
    foreach($this->getPages() as $page)
    {
      $items[] = MenuItem::create($page->getName())->setHref('/' . $page->getID())->setLeading($page->getIcon());
    }
    return Menu::create($items);
  }

  /**
   * @return array|\PackagedUi\FusionDemo\UiPage[]
   */
  public function getPages()
  {
    $ctx = $this->getContext();
    if($ctx instanceof UiContext)
    {
      return $ctx->configHandler()->getPages();
    }
    return [];
  }
}
