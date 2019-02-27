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
   * @return MenuItem
   */
  public function setLink($link): MenuItem
  {
    $this->_link = $link;
    return $this;
  }

  protected function _prepareForProduce(): HtmlTag
  {
    return parent::_prepareForProduce()
      ->setAttribute('href', $this->_link)
      ->addClass('menu-item');
  }
}
