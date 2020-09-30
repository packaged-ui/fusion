<?php
namespace PackagedUi\FusionDemo\Elements;

use Exception;
use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Text\HeadingThree;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\XyGrid\XyCell;
use PackagedUi\Fusion\Layout\XyGrid\XyContainer;
use PackagedUi\Fusion\Layout\XyGrid\XyGrid;
use PackagedUi\FusionDemo\AbstractDemoPage;

/**
 * Class XyGridDemo
 * @package PackagedUi\FusionDemo\Elements
 */
class XyGridDemo extends AbstractDemoPage
{
  /**
   * XyGridDemo constructor.
   * @throws Exception
   */
  public function __construct()
  {

    ResourceManager::inline()->requireCss(
      "
    .grid-x {
      background: rgba(0,0,0,.06);
    }
    
    .cell{
      background: rgba(152,127,255, 0.4)!important;
      min-height: 50px !important;
      color: white !important;
    }
    "
    );
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return 'XY Grid';
  }

  /**
   * @return string
   */
  protected function _getFaIcon(): string
  {
    return FaIcon::TH_LARGE;
  }

  /**
   * @return array
   */
  protected function _content(): array
  {
    $return = [];

    $return[] = HeadingThree::create('Example Layout using Grid X with MarginX and Y');

    $return[] = XyContainer::create(
      XyGrid::create(
        XyCell::create(
          XyGrid::create(
            XyCell::create('Content')->setSizes(6, 6),
            XyCell::create('Content')->setSizes(6, 6)
          )->marginY()->marginX(),
          XyGrid::create(
            XyCell::create('Content')->setSizes(6, 8)->setOffsets(6, 4)
          )->marginY()->marginX()
        )->setSizes(8),
        XyCell::create('SideBar')->setSizes(4)
      )->marginX()->marginY()
    );

    return $return;
  }
}
