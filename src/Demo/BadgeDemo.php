<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Span;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Badge;
use PackagedUi\Elegance\Elegance;

class BadgeDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];

    $return[] = Badge::create(Span::create('Inbox'), 4)->addClass(Elegance::DISPLAY_INLINE_BLOCK);
    $return[] = Badge::overlap(Span::create('Inbox'), 5)->addClass(Elegance::DISPLAY_INLINE_BLOCK);
    $return[] = Badge::create(Div::create('Inbox'), 23)->addClass(
      Elegance::BADGE_ADDED_MARGIN,
      Elegance::DISPLAY_INLINE_BLOCK
    );
    return SafeHtml::escape($return);
  }
}
