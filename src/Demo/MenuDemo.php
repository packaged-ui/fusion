<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Menu\Menu;
use PackagedUi\Elegance\Menu\MenuItem;

class MenuDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];
    $return[] = Menu::create(
      MenuItem::create()->setLink('/menu/1')->setPrimary('primary'),
      MenuItem::create()->setLink('/menu/2')->setPrimary('primary')->setTrailing('T'),
      MenuItem::create()->setLink('/menu/3')->setPrimary('primary')->setLeading('L'),
      MenuItem::create()->setLink('/menu/4')->setPrimary('primary')->setLeading('L')->setTrailing('T'),
      MenuItem::create()->setLink('/menu/5')->setPrimary('primary')->setSecondary('secondary'),
      MenuItem::create()->setLink('/menu/6')->setPrimary('primary')->setSecondary('secondary')->setTrailing('T'),
      MenuItem::create()->setLink('/menu/7')->setPrimary('primary')->setSecondary('secondary')->setLeading('L'),
      MenuItem::create()
        ->setLink('/menu/8')
        ->setPrimary('primary')->setSecondary('secondary')->setLeading('L')->setTrailing('T')
    );

    return SafeHtml::escape($return);
  }
}
