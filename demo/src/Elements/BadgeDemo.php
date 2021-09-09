<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;
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
    return Div::create(Badge::create(Span::create('Inbox'), 4), 'text');
  }

  /**
   * Example of Text within a Badge.
   *
   * @return HtmlTag
   */
  final public function TextBadge(): HtmlTag
  {
    return Div::create(Badge::create(Span::create('Inbox'), 'info'), 'text');
  }

  /**
   * @return HtmlTag
   */
  final public function OverlapBadge(): HtmlTag
  {
    return Div::create(Badge::overlap(Span::create('Inbox'), 5), 'text');
  }

  /**
   * Example of Text within a Badge.
   *
   * @return HtmlTag
   */
  final public function TextOverlapBadge(): HtmlTag
  {
    return Div::create(Badge::overlap(Span::create('Inbox'), 'info'), 'text');
  }
}
