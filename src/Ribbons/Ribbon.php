<?php
namespace PackagedUi\Fusion\Ribbons;

use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponent;
use PackagedUi\BemComponent\BemComponentTrait;

class Ribbon extends HtmlElement implements BemComponent
{
  use BemComponentTrait;

  public function getBlockName(): string
  {
    return 'ribbon';
  }

  protected $_tag = 'div';

  public function __construct($content)
  {
    $this->setContent($content);
    $this->addClass($this->getBlockName());
    $this->right();
  }

  public static function wrap(HtmlElement $wrapper)
  {
    $wrapper->addClass('ribbon-wrapper');
    return $wrapper;
  }

  public static function create($content)
  {
    return new static($content);
  }

  protected $_content;

  public function setContent($content)
  {
    $this->_content = $content;
    return $this;
  }

  protected function _getContentForRender()
  {
    return Span::create($this->_content);
  }

  public function left()
  {
    $this->removeClass($this->getModifier('top'));
    $this->removeClass($this->getModifier('right'));
    $this->addClass($this->getModifier('left'));
    return $this;
  }

  public function right()
  {
    $this->removeClass($this->getModifier('top'));
    $this->removeClass($this->getModifier('left'));
    $this->addClass($this->getModifier('right'));
    return $this;
  }

  public function top()
  {
    $this->removeClass($this->getModifier('left'));
    $this->removeClass($this->getModifier('right'));
    $this->addClass($this->getModifier('top'));
    return $this;
  }

}
