<?php
namespace PackagedUi\FusionDemo\Layout;

use Packaged\Context\ContextAware;
use Packaged\Context\ContextAwareTrait;
use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Element;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\Drawer\Drawer;
use PackagedUi\Fusion\LayoutInterface;
use PackagedUi\Fusion\Menu\Menu;
use PackagedUi\Fusion\Menu\MenuItem;
use PackagedUi\FusionDemo\UiContext;

class Layout extends Element implements ContextAware
{
  use ContextAwareTrait;

  protected $_content = [];

  public function __construct()
  {
    Fusion::includeGoogleFont();
    Fusion::requireCss();
    Fusion::requireJs();
    ResourceManager::vendor('packaged-ui', 'fontawesome')->requireCss(FaIcon::CSS_PATH);
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
