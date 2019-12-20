<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Ribbons\BannerRibbon;
use PackagedUi\Fusion\Ribbons\Ribbon;
use PackagedUi\FusionDemo\AbstractDemoPage;

class RibbonDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Ribbon';
  }

  protected function _getFaIcon()
  {
    return FaIcon::RIBBON;
  }

  protected function _content(): array
  {
    $return = [];

    $bg = Color::GREY()->background(true);

    $return[] = Ribbon::wrap(
      Div::create("Right Ribbon", Ribbon::create("POPULAR"))
        ->addClass(Fusion::PADDING_EXTRA_LARGE, Fusion::DISPLAY_INLINE_BLOCK, Fusion::MARGIN_LARGE, $bg)
    );
    $return[] = Ribbon::wrap(
      Div::create("Left Ribbon", Ribbon::create("POPULAR")->left())
        ->addClass(Fusion::PADDING_EXTRA_LARGE, Fusion::DISPLAY_INLINE_BLOCK, Fusion::MARGIN_LARGE, $bg)
    );

    $return[] = Ribbon::wrap(
      Div::create("Left Ribbon", Ribbon::create("POPULAR")->top())
        ->addClass(Fusion::PADDING_EXTRA_LARGE, Fusion::DISPLAY_INLINE_BLOCK, Fusion::MARGIN_LARGE, $bg)
    );

    $return[] = BannerRibbon::create("This is a banner ribbon");
    $return[] = BannerRibbon::create("50% OFF")->vertical();

    return $return;
  }
}
