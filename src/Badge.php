<?php
namespace PackagedUi\Fusion;

use Packaged\Glimpse\Core\HtmlTag;

class Badge
{
  public static function create(HtmlTag $on, $badgeValue)
  {
    $on->setAttribute('data-badge', $badgeValue);
    $on->addClass(BadgeInterface::BADGE);
    return $on;
  }

  public static function overlap(HtmlTag $on, $badgeValue)
  {
    $on = static::create($on, $badgeValue);
    $on->addClass(BadgeInterface::BADGE_OVERLAP);
    return $on;
  }
}
