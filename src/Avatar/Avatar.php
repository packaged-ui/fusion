<?php
namespace PackagedUi\Fusion\Avatar;

use Fortifi\Ui\Interfaces\IColours;
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
    $words = array_values(array_filter(explode(' ', $text)));
    $prefix = isset($words[1]) ? $words[0][0] . $words[1][0] : $words[0][0];

    $ele = parent::create();
    $ele->setColorFromString($text);
    $ele->setAttribute('data-text', $prefix);
    return $ele;
  }

  public function setColorFromString(string $text)
  {
    switch(substr(md5($text), -1))
    {
      case 0:
        $this->setColor(Color::RED());
        break;
      case 1:
        $this->setColor(Color::ORANGE());
        break;
      case 2:
      case 'c':
        $this->setColor(Color::YELLOW());
        break;
      case 3:
      case 'd':
        $this->setColor(Color::GREEN());
        break;
      case 4:
      case 'e':
        $this->setColor(Color::SKY());
        break;
      case 5:
      case 'f':
        $this->setColor(Color::BLUE());
        break;
      case 6:
        $this->setColor(Color::INDIGO());
        break;
      case 7:
      case 'a':
        $this->setColor(Color::PURPLE());
        break;
      case 8:
      case 'b':
        $this->setColor(Color::PINK());
        break;
      case 9:
        $this->setColor(Color::GREY());
        break;
      default:
        $this->setColor(Color::CHECKERED());
        break;
    }
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
