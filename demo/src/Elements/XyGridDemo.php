<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\XyGrid\GridCell;
use PackagedUi\Fusion\Layout\XyGrid\GridContainer;
use PackagedUi\Fusion\Layout\XyGrid\GridX;
use PackagedUi\FusionDemo\AbstractDemoPage;
use function str_repeat;

class XyGridDemo extends AbstractDemoPage
{
  public function __construct()
  {

    ResourceManager::inline()->requireCss(
      "
    .grid-x {
      background: rgba(0,0,0,.1);
    }
    
    .cell{
      background: #987fff !important;
      min-height: 50px !important;
      color: white !important;
    }
    "
    );
  }

  public function getName(): string
  {
    return 'XY Grid';
  }

  protected function _getFaIcon()
  {
    return FaIcon::TH_LARGE;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = GridContainer::create(
      GridX::create(
        new SafeHtml(str_repeat(GridCell::create('Amazing Cell')->setSizes(6, 4), 2))
      )
    );

    $return[] = GridContainer::create(
      GridX::create(
        new SafeHtml(str_repeat(GridCell::create('Amazing Cell')->setSizes(6, 4), 4))
      )->marginY()->marginX()
    );

    $return[] = GridContainer::create(
      GridX::create(
        new SafeHtml(str_repeat(GridCell::create('Amazing Cell')->setSizes(1, 1, 1), 12))
      )->marginY()->marginX()
    );

    return $return;
  }
}
