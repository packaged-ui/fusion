<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\HeadingOne;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Button\EleganceButton;
use PackagedUi\Elegance\Elegance;

class ThemeDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];

    $return[] = Div::create(
      [
        Div::create()->addClass(Elegance::PADDING_MEDIUM, Elegance::THEME_BG_PRIMARY_DARK),
        Div::create(
          [
            HeadingOne::create("Palette Preview"),
            HeadingSix::create("Full Palette colours below")->addClass(Elegance::TEXT_MEDIUM_EMPHASIS),
            EleganceButton::create("+")->fab(),
          ]
        )->addClass(Elegance::PADDING_LARGE, Elegance::THEME_BG_PRIMARY),
        Div::create("This is some standard content"),
      ]
    );

    return SafeHtml::escape($return);
  }
}
