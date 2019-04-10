<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Span;
use PackagedUi\Fusion\Badge;
use PackagedUi\Fusion\Fusion;

class BadgeDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];

    $return[] = Badge::create(Span::create('Inbox'), 4)->addClass(Fusion::DISPLAY_INLINE_BLOCK);
    $return[] = Badge::overlap(Span::create('Inbox'), 5)->addClass(Fusion::DISPLAY_INLINE_BLOCK);
    $return[] = Badge::create(Div::create('Inbox'), 23)->addClass(
      Fusion::BADGE_ADDED_MARGIN,
      Fusion::DISPLAY_INLINE_BLOCK
    );
    return $return;
  }
}
