<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Span;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Color\Color;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\AbstractDemoPage;

class ColorDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Colors';
  }

  protected function _getFaIcon()
  {
    return FaIcon::PALETTE;
  }

  protected function _content(): array
  {
    $return = [];

    foreach(Color::getKeyedValues() as $color => $display)
    {
      $return[] = Span::create($display)->addClass(Color::foregroundCss($color), Fusion::PADDING_MEDIUM);
    }

    foreach(Color::getKeyedValues() as $color => $display)
    {
      $return[] = Div::create("Background " . $display)
        ->addClass(Color::backgroundCss($color), Fusion::PADDING_MEDIUM);
    }

    foreach(Color::getKeyedValues() as $color => $display)
    {
      $return[] = Div::create("Solid Background " . $display)
        ->addClass(Color::backgroundCss($color, true), Fusion::PADDING_MEDIUM);
    }

    return $return;
  }
}
