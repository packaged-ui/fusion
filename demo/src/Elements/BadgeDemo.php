<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Span;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Badge\Badge;

class BadgeDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Badges';
  }

  protected function _getFaIcon()
  {
    return FaIcon::CERTIFICATE;
  }

  /**
   * Example of the Default Badge.
   *
   * @return HtmlTag
   */
  final public function DefaultBadge(): HtmlTag
  {
    return Badge::create(Span::create('Inbox'), 4);
  }

  /**
   * @return HtmlTag
   */
  final public function OutboxBadge(): HtmlTag
  {
    return Badge::create(Span::create('Outbox'), 5);
  }

}
