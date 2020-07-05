<?php
namespace PackagedUi\Fusion\Typography;

use Packaged\Glimpse\Tags\Span;

class TextNoWrap extends Span
{
  public function __construct(...$content)
  {
    parent::__construct($content);
    $this->addClass(TypographyInterface::TEXT_NOWRAP);
  }
}
