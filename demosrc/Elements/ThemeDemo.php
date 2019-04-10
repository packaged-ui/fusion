<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\HeadingOne;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\DemoSection;

class ThemeDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];

    $return[] = Div::create(
      [
        Div::create()->addClass(Fusion::PADDING_MEDIUM, Fusion::THEME_BG_PRIMARY_DARK),
        Div::create(
          [
            HeadingOne::create("Palette Preview"),
            HeadingSix::create("Full Palette colours below")->addClass(Fusion::TEXT_MEDIUM_EMPHASIS),
            Button::create("+")->fab(),
          ]
        )->addClass(Fusion::PADDING_LARGE, Fusion::THEME_BG_PRIMARY),
        Div::create("This is some standard content"),
      ]
    );

    return $return;
  }
}
