<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\Fusion\Lists\ListBox;
use PackagedUi\Fusion\Lists\ListItem;
use PackagedUi\FusionDemo\DemoSection;

class ListDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];
    $return[] = ListBox::create(
      ListItem::create('primary 1'),
      ListItem::create('primary 2')->setTrailing('T'),
      ListItem::create('primary 3')->setLeading('L'),
      ListItem::create('primary 4')->setLeading('L')->setTrailing('T'),
      ListItem::create('primary 5')->setSecondary('secondary'),
      ListItem::create('primary 6')->setSecondary('secondary')->setTrailing('T'),
      ListItem::create('primary 7')->setSecondary('secondary')->setLeading('L'),
      ListItem::create('primary 8')->setSecondary('secondary')->setLeading('L')->setTrailing('T')
    );

    return $return;
  }
}
