<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\Div;
use Packaged\SafeHtml\ISafeHtmlProducer;
use Packaged\SafeHtml\SafeHtml;

abstract class DemoSection implements ISafeHtmlProducer
{
  abstract protected function _content();

  public function produceSafeHTML(): SafeHtml
  {
    return Div::create($this->_content())->produceSafeHTML();
  }

}
