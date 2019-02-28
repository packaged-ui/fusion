<?php
namespace PackagedUi\Elegance\Lists;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\Elegance\Elegance;

class ListItem extends HtmlTag
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
   * @return static
   */
  public function setTag(string $tag)
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
   * @return static
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
   * @return static
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
   * @return static
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
   * @return static
   */
  public function setTrailing($trailing)
  {
    $this->_trailing = $trailing;
    return $this;
  }

  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce()->addClass('list-item');
    if($this->_leading)
    {
      $ele->appendContent(Div::create($this->_leading)->addClass('list-item__leading'));
    }
    $text = Div::create()->addClass('list-item__text');
    $text->appendContent(Div::create($this->_primary)->addClass(Elegance::TEXT_HIGH_EMPHASIS));
    if($this->_secondary)
    {
      $text->appendContent(
        Div::create($this->_secondary)->addClass('list-item__secondary', Elegance::TEXT_MEDIUM_EMPHASIS)
      );
      $ele->addClass('list-item--multi');
    }
    $ele->appendContent($text);
    if($this->_trailing)
    {
      $ele->appendContent(Div::create($this->_trailing)->addClass('list-item__trailing'));
    }
    return $ele;
  }
}
