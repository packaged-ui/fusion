<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\Lists\ListItem;
use Packaged\Glimpse\Tags\Lists\UnorderedList;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use Packaged\Glimpse\Tags\Text\HeadingThree;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Elegance\Elegance;
use PackagedUi\Elegance\Layout\Drawer\Drawer;

class DrawerDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];
    $return[] =
      Drawer::create(
        HeadingThree::create('Camera')
          ->addClass(Elegance::DRAWER_TOGGLE),
        UnorderedList::create(
          ListItem::collection(
            [
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
              'All Photos',
              'Shared with me',
              'Starred',
              'Recent',
            ]
          )
        )
      )
        ->setHeader(HeadingThree::create("My App"), HeadingSix::create("Sub Title"))
        ->setState(Drawer::STATE_NARROW)
        ->setReveal(Drawer::REVEAL_MODAL)
        ->setAppContent(new TypographyDemo());

    return SafeHtml::escape($return);
  }
}
