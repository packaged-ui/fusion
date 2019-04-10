<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\Fusion\Menu\Menu;
use PackagedUi\Fusion\Menu\MenuItem;
use PackagedUi\FusionDemo\DemoSection;

class MenuDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];
    $return[] = Menu::create(
      MenuItem::create('primary 1')->setHref('/menu/1'),
      MenuItem::create('primary 2')->setHref('/menu/2')->setTrailing('T'),
      MenuItem::create('primary 3')->setHref('/menu/3')->setLeading('L'),
      MenuItem::create('primary 4')->setHref('/menu/4')->setLeading('L')->setTrailing('T'),
      MenuItem::create('primary 5')->setHref('/menu/5')->setSecondary('secondary'),
      MenuItem::create('primary 6')->setHref('/menu/6')->setSecondary('secondary')->setTrailing('T'),
      MenuItem::create('primary 7')->setHref('/menu/7')->setSecondary('secondary')->setLeading('L'),
      MenuItem::create('primary 8')->setHref('/menu/8')->setSecondary('secondary')->setLeading('L')->setTrailing('T')
    );

    return $return;
  }
}
