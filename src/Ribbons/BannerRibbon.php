<?php
namespace PackagedUi\Fusion\Ribbons;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponent;
use PackagedUi\BemComponent\BemComponentTrait;

class BannerRibbon extends HtmlElement implements BemComponent
{
  use BemComponentTrait;

  public function getBlockName(): string
  {
    return 'banner-ribbon';
  }

  protected $_tag = 'div';

  public function __construct($content)
  {
    $this->setContent($content);
    $this->addClass($this->getBlockName());
    $this->horizontal();
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
    return $this->_content;
  }

  public function vertical()
  {
    $this->removeClass($this->getModifier('horizontal'));
    $this->addClass($this->getModifier('vertical'));
    return $this;
  }

  public function horizontal()
  {
    $this->removeClass($this->getModifier('vertical'));
    $this->addClass($this->getModifier('horizontal'));
    return $this;
  }

}
