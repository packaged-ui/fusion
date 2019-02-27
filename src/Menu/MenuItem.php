<?php
namespace PackagedUi\Elegance\Menu;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\Elegance\Elegance;

class MenuItem extends HtmlTag
{
  protected $_tag = 'li';

  protected $_primary;
  protected $_secondary;
  protected $_leading;
  protected $_trailing;

  /**
   * @return string
   */
  public function getTag(): string
  {
    return $this->_tag;
  }

  /**
   * @param string $tag
   *
   * @return MenuItem
   */
  public function setTag(string $tag): MenuItem
  {
    $this->_tag = $tag;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getPrimary()
  {
    return $this->_primary;
  }

  /**
   * @param mixed $primary
   *
   * @return MenuItem
   */
  public function setPrimary($primary)
  {
    $this->_primary = $primary;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getSecondary()
  {
    return $this->_secondary;
  }

  /**
   * @param mixed $secondary
   *
   * @return MenuItem
   */
  public function setSecondary($secondary)
  {
    $this->_secondary = $secondary;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getLeading()
  {
    return $this->_leading;
  }

  /**
   * @param mixed $leading
   *
   * @return MenuItem
   */
  public function setLeading($leading)
  {
    $this->_leading = $leading;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getTrailing()
  {
    return $this->_trailing;
  }

  /**
   * @param mixed $trailing
   *
   * @return MenuItem
   */
  public function setTrailing($trailing)
  {
    $this->_trailing = $trailing;
    return $this;
  }

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce()->addClass('menu-item');
    if($this->_leading)
    {
      $ele->appendContent(Div::create($this->_leading)->addClass('menu-item__leading'));
    }
    $text = Div::create()->addClass('menu-item__text');
    $text->appendContent(Div::create($this->_primary)->addClass(Elegance::TEXT_HIGH_EMPHASIS));
    if($this->_secondary)
    {
      $text->appendContent(
        Div::create($this->_secondary)->addClass('menu-item__secondary', Elegance::TEXT_MEDIUM_EMPHASIS)
      );
      $ele->addClass('menu-item--multi');
    }
    $ele->appendContent($text);
    if($this->_trailing)
    {
      $ele->appendContent(Div::create($this->_trailing)->addClass('menu-item__trailing'));
    }
    return $ele;
  }
}
