<?php
namespace PackagedUi\Fusion\Tiles;

use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Element;
use PackagedUi\FontAwesome\FaIcon;

class TileAction extends Element
{
  /** @var Link|Span */
  protected $_link;
  /** @var FaIcon */
  protected $_icon;
  /** @var string|null */
  protected $_tooltip = null;
  protected $_isDisabled = false;

  /**
   * @return static
   */
  public static function create()
  {
    return new static();
  }

  /**
   * @return Link|Span
   */
  public function render(): string
  {
    if($this->_isDisabled || (!($this->_link instanceof Link)))
    {
      $return = Span::create();
    }
    else
    {
      $return = $this->_link;
    }

    if($this->_tooltip !== null)
    {
      $return->setAttribute('data-toggle', 'tooltip');
      $return->setAttribute('title', $this->_tooltip);
    }

    if($this->_icon !== null)
    {
      $return->setContent($this->_icon);
      if($this->_isDisabled)
      {
        $this->_icon->setColour('#ccc');
      }
    }

    $return->addClass('action');

    return $this->_link;
  }

  /**
   * @return Link|Span
   */
  public function getLink()
  {
    return $this->_link;
  }

  /**
   * @param Link|Span $link
   *
   * @return TileAction
   */
  public function setLink(Link $link = null)
  {
    $this->_link = $link;
    return $this;
  }

  /**
   * @return FaIcon
   */
  public function getIcon()
  {
    return $this->_icon;
  }

  /**
   * @param FaIcon $icon
   *
   * @return TileAction
   */
  public function setIcon(FaIcon $icon)
  {
    $this->_icon = $icon;
    return $this;
  }

  /**
   * You should never really need to do this. But just in case...
   *
   * @param string $text
   *
   * @return $this
   */
  public function setTooltip($text)
  {
    $this->_tooltip = $text;
    return $this;
  }

  /**
   * @return null|string
   */
  public function getTooltip()
  {
    return $this->_tooltip;
  }

  public function setDisabled($disabled)
  {
    $this->_isDisabled = $disabled;
    return $this;
  }

  public function isDisabled()
  {
    return $this->_isDisabled;
  }
}
