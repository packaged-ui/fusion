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

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized("ONE"),
        GridCell::createSized("TWO"),
        GridCell::createSized("THREE"),
        GridCell::createSized("FOUR"),
        GridCell::createSized("FIVE"),
        GridCell::createSized("SIX"),
        GridCell::createSized("SEVEN"),
        GridCell::createSized("EIGHT"),
        GridCell::createSized("NINE"),
        GridCell::createSized("TEN"),
        GridCell::createSized("ELEVEN"),
        GridCell::createSized("TWELVE")
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized("ONE", 1),
        GridCell::createSized("TWO", 1),
        GridCell::createSized("THREE", 1),
        GridCell::createSized("FOUR", 1),
        GridCell::createSized("FIVE", 1),
        GridCell::createSized("SIX", 1),
        GridCell::createSized("SEVEN", 1),
        GridCell::createSized("EIGHT", 1),
        GridCell::createSized("NINE", 1),
        GridCell::createSized("TEN", 1),
        GridCell::createSized("ELEVEN", 1),
        GridCell::createSized("TWELVE", 1)
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized("", 6),
        GridCell::createSized("", 3),
        GridCell::createSized("", 2),
        GridCell::createSized("", 1),
        GridCell::createSized("", 3),
        GridCell::createSized("", 1),
        GridCell::createSized("", 8)
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized("")->addClass(GridCell::CLASS_ALIGN_TOP),
        GridCell::createSized("")->addClass(GridCell::CLASS_ALIGN_MIDDLE),
        GridCell::createSized("")->addClass(GridCell::CLASS_ALIGN_BOTTOM)
      )
    )->addClass('alignment-demo');

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized(
          GridInner::create(
            GridCell::createSized("Second Level"),
            GridCell::createSized("Second Level")
          )
        ),
        GridCell::createSized("First Level"),
        GridCell::createSized("First Level")
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized("")->setSizes(6, 8),
        GridCell::createSized("")->setSizes(6, 8)
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::createSized("")->setSizes(6, 8),
        GridCell::createSized("")->setSizes(6, 8),
        GridCell::createSized("", 12)
      )->bordered()
    );

    return $return;
  }
}
