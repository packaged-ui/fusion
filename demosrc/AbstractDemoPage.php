<?php
namespace PackagedUi\FusionDemo;

use Packaged\Helpers\Strings;
use Packaged\SafeHtml\SafeHtml;
use Packaged\Ui\Element;
use PackagedUi\FontAwesome\FaIcon;

abstract class AbstractDemoPage extends Element implements UiPage
{
  abstract protected function _content(): array;

  public function getID(): string
  {
    return Strings::urlize($this->getName());
  }

  public function render(): string
  {
    return SafeHtml::escape($this->_content())->getContent();
  }

  public function getIcon()
  {
    return FaIcon::create($this->_getFaIcon())->sizeLarge()->fixedWidth();
  }

  protected function _getFaIcon()
  {
    return FaIcon::FONT;
  }
}
