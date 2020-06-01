<?php
namespace PackagedUi\Fusion\Ribbons;

use Packaged\Glimpse\Tags\Span;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Ribbon extends HtmlElement implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'ribbon';
  }

  protected $_tag = 'div';

  public function __construct($content)
  {
    $this->_constructComponent();
    $this->_construct();
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
    return $this->removeModifier('top')->removeModifier('right')->addModifier('left');
  }

  public function right()
  {
    return $this->removeModifier('top')->removeModifier('left')->addModifier('right');
  }

  public function top()
  {
    return $this->removeModifier('left')->removeModifier('right')->addModifier('top');
  }

}
