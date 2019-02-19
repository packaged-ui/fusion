<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\HorizontalRule;
use PackagedUi\Elegance\Layout\Grid\GridCell;
use PackagedUi\Elegance\Layout\Grid\GridInner;
use PackagedUi\Elegance\Layout\Grid\GridLayout;

class GridDemo extends DemoSection
{
  protected function _content()
  {
    ResourceManager::inline()->requireCss(
      "
    .layout-grid{
      background: rgba(0,0,0,.2);
      min-width: 360px;
    }
    
    .layout-grid__cell{
      background: rgba(0,0,0,.2);
      min-height: 100px;
    }
    
    .alignment-demo, .alignment-demo .layout-grid__inner{
      min-height: 200px;
    }
    
    .alignment-demo .layout-grid__cell{
      min-height: 50px;
      max-height: 50px;
    }
    "
    );
    $return = [];

    $return[] = GridLayout::create(
      GridInner::create(
        [
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
          GridCell::create("TWELVE"),
        ]
      )
    );

    $return[] = HorizontalRule::create();

    $return[] = GridLayout::create(
      GridInner::create(
        [
          GridCell::create("ONE", 1),
          GridCell::create("TWO", 1),
          GridCell::create("THREE", 1),
          GridCell::create("FOUR", 1),
          GridCell::create("FIVE", 1),
          GridCell::create("SIX", 1),
          GridCell::create("SEVEN", 1),
          GridCell::create("EIGHT", 1),
          GridCell::create("NINE", 1),
          GridCell::create("TEN", 1),
          GridCell::create("ELEVEN", 1),
          GridCell::create("TWELVE", 1),
        ]
      )
    );

    $return[] = HorizontalRule::create();

    $return[] = GridLayout::create(
      GridInner::create(
        [
          GridCell::create("", 6),
          GridCell::create("", 3),
          GridCell::create("", 2),
          GridCell::create("", 1),
          GridCell::create("", 3),
          GridCell::create("", 1),
          GridCell::create("", 8),
        ]
      )
    );

    $return[] = HorizontalRule::create();

    $return[] = GridLayout::create(
      GridInner::create(
        [
          GridCell::create("")->addClass(GridCell::CLASS_ALIGN_TOP),
          GridCell::create("")->addClass(GridCell::CLASS_ALIGN_MIDDLE),
          GridCell::create("")->addClass(GridCell::CLASS_ALIGN_BOTTOM),
        ]
      )
    )->addClass('alignment-demo');

    $return[] = HorizontalRule::create();

    $return[] = GridLayout::create(
      GridInner::create(
        [
          GridCell::create(
            GridInner::create(
              [
                GridCell::create("Second Level"),
                GridCell::create("Second Level"),
              ]
            )
          ),
          GridCell::create("First Level"),
          GridCell::create("First Level"),
        ]
      )
    );

    return $return;
  }
}
