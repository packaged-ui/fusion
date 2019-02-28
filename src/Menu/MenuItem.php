<?php
namespace PackagedUi\Elegance\Menu;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\Elegance\Lists\ListItem;

class MenuItem extends ListItem
{
  protected $_tag = 'a';
  protected $_link;

  /**
   * @return mixed
   */
  public function getLink()
  {
    return $this->_link;
  }

  /**
   * @param mixed $link
   *
   * @return static
   */
  public function setLink($link)
  {
    $this->_link = $link;
    return $this;
  }

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce()->addClass('menu-item');
    if($this->_link !== null)
    {
      $ele->setAttribute('href', $this->_link);
    }
    return $ele;
  }
}
