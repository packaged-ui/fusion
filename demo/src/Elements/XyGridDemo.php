<?php
namespace PackagedUi\FusionDemo\Elements;

use Exception;
use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Text\HeadingThree;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\XyGrid\XyCell;
use PackagedUi\Fusion\Layout\XyGrid\XyContainer;
use PackagedUi\Fusion\Layout\XyGrid\XyGrid;
use PackagedUi\Fusion\Layout\XyGrid\XySize;
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
            XyCell::create('Content')->setSizes(XySize::DESKTOP(6), XySize::TABLET(6)),
            XyCell::create('Content')->setSizes(XySize::DESKTOP(6), XySize::TABLET(6))
          )->marginY()->marginX(),
          XyGrid::create(
            XyCell::create('Content')->setSizes(XySize::DESKTOP(6), XySize::TABLET(8))->setOffsets(
              XySize::DESKTOP(6),
              XySize::TABLET(4)
            )
          )->marginY()->marginX()
        )->setSizes(XySize::DESKTOP(8)),
        XyCell::create('SideBar')->setSizes(XySize::DESKTOP(4))
      )->marginX()->marginY()
    );

    return $return;
  }
}
