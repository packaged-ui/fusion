<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\LineBreak;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\Grid\GridCell;
use PackagedUi\Fusion\Layout\Grid\GridInner;
use PackagedUi\Fusion\Layout\Grid\GridLayout;
use PackagedUi\FusionDemo\AbstractDemoPage;

class GridDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Grid';
  }

  protected function _getFaIcon()
  {
    return FaIcon::GRIP_HORIZONTAL;
  }

  public function __construct()
  {

    ResourceManager::inline()->requireCss(
      "
    .grid{
      background: rgba(0,0,0,.2);
      min-width: 360px;
    }
    
    .grid__cell{
      background: rgba(0,0,0,.2);
      min-height: 100px;
    }
    
    .alignment-demo, .alignment-demo .grid__inner{
      min-height: 200px;
    }
    
    .alignment-demo .grid__cell{
      min-height: 50px;
      max-height: 50px;
    }
    "
    );
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = GridLayout::createWithInner(
      GridCell::create("ONE"),
      GridCell::create("TWO"),
      GridCell::create("THREE"),
      GridCell::create("FOUR"),
      GridCell::create("FIVE"),
      GridCell::create("SIX"),
      GridCell::create("SEVEN"),
      GridCell::create("EIGHT"),
      GridCell::create("NINE"),
      GridCell::create("TEN"),
      GridCell::create("ELEVEN"),
      GridCell::create("TWELVE")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create("ONE"),
      GridCell::create("TWO")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createwithCells(
      "ONE",
      "TWO"
    )->autoFit();

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create("")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create("")->alignTop(),
      GridCell::create("")->alignMiddle(),
      GridCell::create("")->alignBottom()
    )->autoFit()->addClass('alignment-demo');

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::create(
          GridInner::create(
            GridCell::create("Second Level"),
            GridCell::create("Second Level")
          )
        ),
        GridCell::create("First Level"),
        GridCell::create("First Level")
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create(""),
      GridCell::create("")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::create(""),
        GridCell::create(""),
        GridCell::create("")
      )->bordered()
    );

    return $return;
  }
}
