<?php
namespace PackagedUi\Fusion\Menu;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\Fusion\Lists\ListItem;

class MenuItem extends ListItem
{
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

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce()->addClass('menu-item');
    if($this->_href !== null)
    {
      $ele->setAttribute('href', $this->_href);
    }
    return $ele;
  }
}
