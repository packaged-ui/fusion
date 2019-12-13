<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Text\HeadingThree;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Fusion;
use PackagedUi\Fusion\Layout\Drawer\Drawer;
use PackagedUi\Fusion\Menu\Menu;
use PackagedUi\Fusion\Menu\MenuItem;
use PackagedUi\FusionDemo\AbstractDemoPage;

class DrawerDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Drawer';
  }

  protected function _getFaIcon()
  {
    return FaIcon::BARS;
  }

  protected function _content(): array
  {
    $return = [];
    $return[] = Drawer::create(Menu::create(MenuItem::create('A Link')->setHref('#link')))
      ->setHeader(HeadingThree::create('< Toggle Drawer')->addClass(Fusion::DRAWER_TOGGLE))
      ->setAppContent(new TypographyDemo())
      ->setReveal(Drawer::REVEAL_MODAL)
      ->setState(Drawer::STATE_NARROW)
      ->setPosition(Drawer::POSITION_RIGHT);

    return $return;
  }
}
