<?php
namespace PackagedUi\Fusion\Card;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Link;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Card extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return 'card';
  }

  protected $_header;
  protected $_footer;
  protected $_title;
  protected $_footerActions = [];
  protected $_withContentContainer = true;
  /**
   * @var Color
   */
  protected $_color;

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass($this->getBlockName());
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
  public function getTitle()
  {
    return $this->_title;
  }

  /**
   * @param string $title
   *
   * @return Card
   */
  public function setTitle($title)
  {
    $this->_title = $title;
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
    if($this->_header || $this->_title)
    {
      $return[] = Div::create(
        $this->_title ? Div::create($this->_title)->addClass($this->getElementName('header', 'title')) : null,
        $this->_header
      )->addClass($this->getElementName('header'));
    }
    if($this->_withContentContainer)
    {
      $return[] = Div::create(parent::_getContentForRender())->addClass($this->getElementName('content'));
    }
    else
    {
      $return[] = parent::_getContentForRender();
    }
    if($this->_footer)
    {
      $return[] = Div::create($this->_footer)->addClass($this->getElementName('footer'));
    }
    if($this->_footerActions)
    {
      $return[] = Div::create($this->_footerActions)->addClass($this->getElementName('footer_actions'));
    }
    return $return;
  }

  public function setColor(Color $color = null)
  {
    if($color === null && $this->_color instanceof Color)
    {
      $this->removeClass($this->getModifier('with-color'), $this->_color->background(), $this->_color->border());
    }
    else
    {
      $this->addClass($this->getModifier('with-color'), $color->background(), $color->border());
    }
    $this->_color = $color;
    return $this;
  }

  public function withoutShadow()
  {
    $this->addClass($this->getModifier('without-shadow'));
    return $this;
  }

  public function addFooterAction(Link $action)
  {
    $this->_footerActions[] = $action->addClass($this->getElementName('footer_action'));
    return $this;
  }

}
