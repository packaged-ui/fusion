<?php
namespace PackagedUi\Fusion\Avatar;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Avatar extends HtmlTag implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  protected $_tag = 'div';
  protected $_color;

  public function __construct()
  {
    parent::__construct();
    $this->_constructComponent();
    $this->_construct();
  }

  public function getBlockName(): string
  {
    return 'avatar';
  }

  public static function image(string $imgUrl)
  {
    $ele = parent::create();
    $ele->setAttribute('style', 'background-image: url("' . $imgUrl . '")');
    return $ele;
  }

  public static function text(string $text)
  {
    $words = explode(' ', $text);
    $prefix = count($words) >= 2 ? $words[0][0] . $words[1][0] : $words[0][0];

    $ele = parent::create();
    $ele->setAttribute('data-text', $prefix);
    return $ele;
  }

  public function setColor(Color $color)
  {
    $this->_color = $color;
    return $this;
  }

  protected function _prepareForProduce(): HtmlElement
  {
    if($this->_color)
    {
      $this->addClass($this->_color->background());
      $this->addClass($this->_color->foreground());
    }
    else
    {
      $this->addClass(Color::INDIGO()->background());
      $this->addClass(Color::INDIGO()->foreground());
    }
    return parent::_prepareForProduce();
  }

  public function small()
  {
    $this->addModifier('small');
    return $this;
  }

  public function medium()
  {
    $this->addModifier('medium');
    return $this;
  }

  public function large()
  {
    $this->addModifier('large');
    return $this;
  }

}
