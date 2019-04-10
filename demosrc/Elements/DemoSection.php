<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\SafeHtml\ISafeHtmlProducer;
use Packaged\SafeHtml\SafeHtml;

abstract class DemoSection implements ISafeHtmlProducer
{
  abstract protected function _content(): array;

  public function produceSafeHTML(): SafeHtml
  {
    return SafeHtml::escape($this->_content());
  }

}
