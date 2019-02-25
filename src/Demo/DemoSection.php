<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\SafeHtml\ISafeHtmlProducer;
use Packaged\SafeHtml\SafeHtml;

abstract class DemoSection implements ISafeHtmlProducer
{
  abstract protected function _content(): SafeHtml;

  public function produceSafeHTML(): SafeHtml
  {
    return $this->_content();
  }

}
