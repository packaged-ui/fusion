<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
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

  public function __construct()
  {
    ResourceManager::inline()->includeCss(
      '.color-demo{ display:flex; flex-wrap: wrap; } .color-demo > *{ border:1px solid rgba(0,0,0,0.1);
  width: 100px; height:100px; display:flex; margin:5px; align-items: center; text-align: center; justify-content: center;
}'
    );
  }

  protected function _getFaIcon()
  {
    return FaIcon::PALETTE;
  }

  protected function _getColors()
  {
    return Color::getKeyedValues();
  }

  protected function _content(): array
  {
    $return = [];

    foreach($this->_getColors() as $color => $display)
    {
      $return[] = Span::create($display)->addClass(Color::foregroundCss($color), Fusion::PADDING_MEDIUM);
    }

    foreach($this->_getColors() as $color => $display)
    {
      $return[] = Div::create("Background " . $display)
        ->addClass(Color::backgroundCss($color), Fusion::PADDING_MEDIUM);
    }

    foreach($this->_getColors() as $color => $display)
    {
      $return[] = Div::create("Solid Background " . $display)
        ->addClass(Color::backgroundCss($color, true), Fusion::PADDING_MEDIUM);
    }

    return [Div::create($return)->addClass('color-demo')];
  }
}
