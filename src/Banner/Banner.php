<?php
namespace PackagedUi\Fusion\Banner;

use Packaged\Glimpse\Tags\Div;
use Packaged\SafeHtml\ISafeHtmlProducer;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class Banner extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  const _MOD_FULL_WIDTH = 'full-width';
  const _MOD_FIXED = 'fixed';
  const _MOD_SHADOW = 'shadow';
  const _MOD_TOP = 'top';
  const _MOD_BOTTOM = 'bottom';

  protected $_icon;
  protected $_buttons = [];

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return 'banner';
  }

  public function addButton(Button ...$btns)
  {
    foreach($btns as $btn)
    {
      $this->_buttons[] = $btn;
    }
    return $this;
  }

  public function setIcon(ISafeHtmlProducer $icon)
  {
    $this->_icon = $icon;
    return $this;
  }

  protected function _getContentForRender()
  {
    return Div::create(
      $this->_icon ? Div::create($this->_icon)->addClass($this->getElementName("icon")) : '',
      Div::create(
        Div::create($this->_content)->addClass($this->getElementName("content")),
        Div::create($this->_buttons)->addClass($this->getElementName("buttons"))
      )->addClass($this->getElementName("wrap"))
    )->addClass($this->getElementName("outer"));
  }

  public function fullWidth()
  {
    $this->addModifier(self::_MOD_FULL_WIDTH);
    return $this;
  }

  public function top()
  {
    $this->addModifier(self::_MOD_TOP);
    return $this;
  }

  public function bottom()
  {
    $this->addModifier(self::_MOD_BOTTOM);
    return $this;
  }

  public function shadow()
  {
    $this->addModifier(self::_MOD_SHADOW);
    return $this;
  }

  public function fixed()
  {
    $this->addModifier(self::_MOD_FIXED);
    return $this;
  }
}

