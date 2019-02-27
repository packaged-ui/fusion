<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Menu\MenuItem;

class MenuDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];
    $return[] = MenuItem::create()->setPrimary('primary');
    $return[] = MenuItem::create()->setPrimary('primary')->setTrailing('T');
    $return[] = MenuItem::create()->setPrimary('primary')->setLeading('L');
    $return[] = MenuItem::create()->setPrimary('primary')->setLeading('L')->setTrailing('T');
    $return[] = MenuItem::create()->setPrimary('primary')->setSecondary('secondary');
    $return[] = MenuItem::create()->setPrimary('primary')->setSecondary('secondary')->setTrailing('T');
    $return[] = MenuItem::create()->setPrimary('primary')->setSecondary('secondary')->setLeading('L');
    $return[] = MenuItem::create()->setPrimary('primary')->setSecondary('secondary')->setLeading('L')->setTrailing('T');

    return SafeHtml::escape($return);
  }
}
