<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Span;
use Packaged\Glimpse\Tags\Text\Paragraph;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Modal\Lightbox\Lightbox;
use PackagedUi\Fusion\Modal\Modal;
use PackagedUi\FusionDemo\AbstractDemoPage;

class LightboxDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Lightbox';
  }

  protected function _getFaIcon()
  {
    return FaIcon::LIGHTBULB;
  }

  protected function _content(): array
  {
    $return = [];

    $lightbox = Lightbox::create(
      Div::create(
        Paragraph::create("You can display any content you want in a lightbox"),
        Modal::makeCloser(Button::create("You can also close with a button"))
      )->addClass(Fusion::TEXT_CENTER, Fusion::PADDING_EXTRA_LARGE)
    );

    $return[] = $lightbox;
    $return[] = Paragraph::create(
      "You can launch a lightbox by ",
      $lightbox->applyLauncher(Link::create("#", Span::create("clicking here")))
    );

    return $return;
  }
}
