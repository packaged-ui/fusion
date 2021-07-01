<?php
namespace PackagedUi\Fusion\Chip;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Chip extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  /** @var string */
  protected $_name;
  /** @var string */
  protected $_tag = "div";
  /** @var Color */
  protected $_color;
  /** @var mixed */
  protected $_action;
  /** @var bool */
  protected $_noBackground = false;
  /** @var mixed */
  protected $_icon;
  /** @var string */
  protected $_value;

  public function __construct()
  {
    parent::__construct();
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
    return 'chip';
  }

  /**
   * @param string|null $name
   *
   * @return Chip
   */
  public function setName(?string $name): Chip
  {
    $this->_name = $name;
    return $this;
  }

  /**
   * @param mixed $icon
   *
   * @return Chip
   */
  public function setIcon($icon)
  {
    $this->_icon = $icon;
    return $this;
  }

  public function setColor(Color $color)
  {
    $this->_color = $color;
    return $this;
  }

  /**
   * @param mixed $action
   *
   * @return Chip
   */
  public function setAction($action)
  {
    $this->_action = $action;
    return $this;
  }

  /**
   * @return Chip
   */
  public function removeBackground()
  {
    $this->_noBackground = true;
    return $this;
  }

  /**
   * @return $this
   */
  public function round()
  {
    return $this->addModifier('round');
  }

  /**
   * @param string $value
   *
   * @return Chip
   */
  public function setValue(string $value)
  {
    $this->_value = $value;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    if(empty($this->_color))
    {
      $this->_color = Color::DARK_GREY();
    }

    $this->addClass($this->_color->border());
    if(!$this->_noBackground)
    {
      $this->addClass($this->_color->background());
    }
    $this->addClass($this->_color->foreground());

    return parent::_prepareForProduce();
  }

  /**
   * @return static
   */
  public static function create(string $name = null)
  {
    return parent::create()->setName($name);
  }

  protected function _getContentForRender()
  {
    if(!empty($this->_icon))
    {
      $this->appendContent(Span::create($this->_icon)->addClass($this->getElementName('icon')));
    }

    $this->appendContent($this->_name);

    if(!empty($this->_value))
    {
      $this->appendContent(Span::create($this->_value)->addClass($this->getElementName('value')));
    }

    if(!empty($this->_action))
    {
      $this->appendContent(Span::create($this->_action)->addClass($this->getElementName('action')));
    }

    return parent::_getContentForRender();
  }
}
