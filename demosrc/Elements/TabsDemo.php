<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\Tabs\Tab;
use PackagedUi\Fusion\Layout\Tabs\TabContainer;
use PackagedUi\FusionDemo\AbstractDemoPage;

class TabsDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Tabs';
  }

  protected function _getFaIcon()
  {
    return FaIcon::FOLDER;
  }

  protected function _content(): array
  {
    $tab = Tab::build("Item One", "Content One Displayed Here");
    $tab2 = Tab::build("Item Two", "Content Two Displayed Here");
    $return = [];
    $return[] = TabContainer::create()
      ->addTab('itm-1', $tab)
      ->addTab('itm-2', $tab2)
      ->setActiveTabByRequest($this->getContext()->request());
    return $return;
  }
}
