<?php
namespace PackagedUi\Fusion\Ribbons;

use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class BannerRibbon extends HtmlElement implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'banner-ribbon';
  }

  protected $_tag = 'div';

  protected function _construct($content)
  {
    $this->setContent($content);
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
    return $this->removeModifier('horizontal')->addModifier('vertical');
  }

  public function horizontal()
  {
    return $this->removeModifier('vertical')->addModifier('horizontal');
  }

}
