<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\XyGrid\Cell;
use PackagedUi\Fusion\Layout\XyGrid\Container;
use PackagedUi\Fusion\Layout\XyGrid\GridX;
use PackagedUi\FusionDemo\AbstractDemoPage;

class XyGridDemo extends AbstractDemoPage
{
  public function __construct()
  {

    ResourceManager::inline()->requireCss(
      "
    .grid-x {
      background: rgba(0,0,0,.2);
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

    $return[] = Container::create(
      GridX::create(
        Cell::create('Amazing Cell')->medium(6),
        Cell::create('Awesome Cell')->medium(6)
      )
    );

    $return[] = Container::create(
      GridX::create(
        Cell::create('Amazing Cell')->medium(6),
        Cell::create('Awesome Cell')->medium(6),
        Cell::create('Amazing Cell')->medium(6),
        Cell::create('Awesome Cell')->medium(6)
      )->marginY()->marginX()
    );

    return $return;
  }
}
