<?php
namespace PackagedUi\Fusion\Menu;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\Lists\ListItem;

class MenuItem extends ListItem
{
  protected function _constructComponent()
  {
    parent::_constructComponent();
    $this->addClass('menu__item');
  }

  protected $_tag = 'a';
  protected $_href;

  /**
   * @return mixed
   */
  public function getHref()
  {
    return $this->_href;
  }

  /**
   * @param mixed $link
   *
   * @return static
   */
  public function setHref($link)
  {
    $this->_href = $link;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    if($this->_href !== null)
    {
      $ele->setAttribute('href', $this->_href);
    }
    return $ele;
  }
}
