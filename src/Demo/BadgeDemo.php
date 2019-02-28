<?php
namespace PackagedUi\Fusion\Demo;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Span;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Fusion\Badge;
use PackagedUi\Fusion\Fusion;

class BadgeDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];

    $return[] = Badge::create(Span::create('Inbox'), 4)->addClass(Fusion::DISPLAY_INLINE_BLOCK);
    $return[] = Badge::overlap(Span::create('Inbox'), 5)->addClass(Fusion::DISPLAY_INLINE_BLOCK);
    $return[] = Badge::create(Div::create('Inbox'), 23)->addClass(
      Fusion::BADGE_ADDED_MARGIN,
      Fusion::DISPLAY_INLINE_BLOCK
    );
    return SafeHtml::escape($return);
  }
}
