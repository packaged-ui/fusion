<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Div;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Elegance;

class LayoutDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    ResourceManager::inline()->requireCss(
      "
    .container{
      display:inline-block;
      background: #dcdcdc;
      overflow:auto;
      margin:0 20px 20px 0;
    }
    
    .cell{
      background: #989898e3;
    }
    
    .cell-inner{
      background: white;
      min-width: 10px;
      min-height: 10px;
    }
    "
    );

    $cells = [];
    $cells[] = Div::create()->addClass(Elegance::MARGIN_LARGE);
    $cells[] = Div::create()->addClass(Elegance::PADDING_LARGE);
    $cells[] = Div::create()->addClass(Elegance::MARGIN_LARGE, Elegance::PADDING_LARGE);
    $cells[] = Div::create()->addClass(
      Elegance::MARGIN_LARGE,
      Elegance::PADDING_LARGE,
      Elegance::MARGIN_RIGHT_SMALL
    );
    $cells[] = Div::create()->addClass(
      Elegance::MARGIN_LARGE,
      Elegance::PADDING_LARGE,
      Elegance::MARGIN_RIGHT_SMALL,
      Elegance::PADDING_LEFT_MEDIUM
    );

    return SafeHtml::escape(
      array_map(
        function (Div $cell) {
          $cell->addClass('cell');
          $cell->setContent(Div::create()->addClass('cell-inner'));
          return Div::create($cell)->addClass('container');
        },
        $cells
      )
    );
  }
}
