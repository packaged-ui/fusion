<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Lists\ListBox;
use PackagedUi\Elegance\Lists\ListItem;

class ListDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];
    $return[] = ListBox::create(
      ListItem::create()->setPrimary('primary'),
      ListItem::create()->setPrimary('primary')->setTrailing('T'),
      ListItem::create()->setPrimary('primary')->setLeading('L'),
      ListItem::create()->setPrimary('primary')->setLeading('L')->setTrailing('T'),
      ListItem::create()->setPrimary('primary')->setSecondary('secondary'),
      ListItem::create()->setPrimary('primary')->setSecondary('secondary')->setTrailing('T'),
      ListItem::create()->setPrimary('primary')->setSecondary('secondary')->setLeading('L'),
      ListItem::create()->setPrimary('primary')->setSecondary('secondary')->setLeading('L')->setTrailing('T')
    );

    return SafeHtml::escape($return);
  }
}
