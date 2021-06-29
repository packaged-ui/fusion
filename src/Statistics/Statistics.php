<?php
namespace PackagedUi\Fusion\Statistics;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Statistics extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_icon;
  /** @var null|Color */
  protected $_iconColor;

  protected $_stat;
  protected $_sub;

  protected $_secondary;
  /** @var null|Color */
  protected $_secondaryColor;

  protected $_isWhite;
  /** @var null|Color */
  protected $_backgroundColor;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
  }

  /**
   * This is the root BEM class that all the other elements
   * and modifiers will use as a base
   *
   * @return string
   */
  public function getBlockName(): string
  {
    return 'statistics';
  }

  /**
   * @param mixed $icon
   *
   * @return Statistics
   */
  public function setIcon($icon)
  {
    $this->_icon = $icon;
    return $this;
  }

  /**
   * @param mixed $stat
   *
   * @return Statistics
   */
  public function setStat($stat)
  {
    $this->_stat = $stat;
    return $this;
  }

  /**
   * @param mixed $sub
   *
   * @return Statistics
   */
  public function setSub($sub)
  {
    $this->_sub = $sub;
    return $this;
  }

  /**
   * @param mixed $secondary
   *
   * @return Statistics
   */
  public function setSecondary(...$secondary)
  {
    $this->_secondary = Div::create(...$secondary);
    return $this;
  }

  /**
   * @param mixed $iconColor
   *
   * @return Statistics
   */
  public function setIconColor(Color $iconColor)
  {
    $this->_iconColor = $iconColor->foreground();
    return $this;
  }

  /**
   * @param mixed $secondaryColor
   *
   * @return Statistics
   */
  public function setSecondaryColor(Color $secondaryColor)
  {
    $this->_secondaryColor = $secondaryColor->foreground();
    return $this;
  }

  /**
   * @return Statistics
   */
  public function isWhite()
  {
    $this->_isWhite = true;
    return $this;
  }

  /**
   * @param \PackagedUi\Fusion\Color\Color $backgroundColor
   *
   * @return Statistics
   */
  public function setBackgroundColor(Color $backgroundColor): Statistics
  {
    $this->_backgroundColor = $backgroundColor->background();
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    if($this->_backgroundColor)
    {
      $this->addClass($this->_backgroundColor);
    }
    return parent::_prepareForProduce();
  }

  protected function _getContentForRender()
  {
    $icon = null;

    if($this->_icon)
    {
      $icon = Div::create($this->_icon)
        ->addClass($this->getElementName('icon'), $this->_iconColor ?: null);
    }

    $wrapper = Div::create(
      $this->_stat ? Div::create($this->_stat)->addClass($this->getElementName('stat')) : null,
      $this->_sub ? Div::create($this->_sub)->addClass($this->getElementName('sub')) : null
    );

    $secondary = null;

    if(!empty($this->_secondary))
    {
      $secondary = Div::create($this->_secondary)
        ->addClass($this->getElementName('secondary'), $this->_secondaryColor ?: null);
    }

    return Div::create($icon, $wrapper, $secondary)
      ->addClass($this->getElementName('wrapper'), $this->_isWhite ? 'white' : null);
  }
}
