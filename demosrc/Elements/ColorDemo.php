<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Span;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\DemoSection;

class ColorDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];

    foreach(Color::getKeyedValues() as $color => $display)
    {
      $return[] = Span::create($display)->addClass(Color::foregroundCss($color), Fusion::PADDING_MEDIUM);
    }

    foreach(Color::getKeyedValues() as $color => $display)
    {
      $return[] = Div::create($display)
        ->addClass(
          Color::foregroundCss($color),
          Color::backgroundCss($color),
          Fusion::PADDING_MEDIUM
        );
    }

    foreach(Color::getKeyedValues() as $color => $display)
    {
      $return[] = Div::create($display)
        ->addClass(Color::backgroundCss($color, true), Fusion::PADDING_MEDIUM);
    }

    return $return;
  }
}
