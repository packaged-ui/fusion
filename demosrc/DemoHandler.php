<?php
namespace PackagedUi\FusionDemo;

use Cubex\Controller\Controller;
use Packaged\Context\Context;
use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Ui\Element;
use PackagedUi\FusionDemo\Layout\Layout;

/**
 * @method  UiContext getContext()
 */
class DemoHandler extends Controller
{
  protected $_pages = [];

  protected function _generateRoutes()
  {
    $firstPage = null;
    foreach($this->getContext()->configHandler()->getPages() as $page)
    {
      if($firstPage == null)
      {
        $firstPage = $page;
      }
      $this->_pages[$page->getID()] = $page;
      yield self::_route($page->getID(), $page->getID());
    }
    return $firstPage ? $firstPage->getID() : parent::_generateRoutes();
  }

  protected function _prepareHandler(Context $c, $handler)
  {
    if(isset($this->_pages[$handler]))
    {
      return $this->_pages[$handler];
    }
    return parent::_prepareHandler($c, $handler);
  }

  protected function _prepareResponse(Context $c, $result, $buffer = null)
  {
    if($result instanceof Element || $result instanceof HtmlTag || is_scalar($result))
    {
      $theme = new Layout();
      $theme->setContext($this->getContext())->setContent($result);
      return parent::_prepareResponse($c, $theme, $buffer);
    }

    return parent::_prepareResponse($c, $result, $buffer);
  }
}
