<?php
namespace PackagedUi\Fusion\Card;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\Fusion\Color\Color;

class Card extends Div
{
  protected $_header;
  protected $_footer;
  protected $_withContentContainer = true;
  /**
   * @var Color
   */
  protected $_color;

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('card');
    return $ele;
  }

  public function disableContentContainer()
  {
    $this->_withContentContainer = false;
    return $this;
  }

  public function enableContentContainer()
  {
    $this->_withContentContainer = true;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getHeader()
  {
    return $this->_header;
  }

  /**
   * @param mixed $header
   *
   * @return Card
   */
  public function setHeader($header)
  {
    $this->_header = $header;
    return $this;
  }

  /**
   * @return mixed
   */
  public function getFooter()
  {
    return $this->_footer;
  }

  /**
   * @param mixed $footer
   *
   * @return Card
   */
  public function setFooter($footer)
  {
    $this->_footer = $footer;
    return $this;
  }

  protected function _getContentForRender()
  {
    $return = [];
    if($this->_header)
    {
      $return[] = Div::create($this->_header)->addClass('card-header');
    }
    if($this->_withContentContainer)
    {
      $return[] = Div::create(parent::_getContentForRender())->addClass('card-content');
    }
    else
    {
      $return[] = parent::_getContentForRender();
    }
    if($this->_footer)
    {
      $return[] = Div::create($this->_footer)->addClass('card-footer');
    }
    return $return;
  }

  public function setColor(Color $color = null)
  {
    if($color === null && $this->_color instanceof Color)
    {
      $this->removeClass('card--with-color', $this->_color->background(), $this->_color->border());
    }
    else
    {
      $this->addClass('card--with-color', $color->background(), $color->border());
    }
    $this->_color = $color;
    return $this;
  }

  public function withoutShadow()
  {
    $this->addClass('card--without-shadow');
    return $this;
  }

}
