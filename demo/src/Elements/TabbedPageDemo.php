<?php

namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\Tabs\Tab;
use PackagedUi\Fusion\Layout\Tabs\TabContainer;
use PackagedUi\FusionDemo\AbstractDemoPage;

class TabbedPageDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Tabbed Page';
  }

  protected function _getFaIcon()
  {
    return FaIcon::FOLDER;
  }

  protected function _content(): array
  {
    $return = [];
    $tab = Tab::build("Item One", "Content One Displayed Here");
    $tab2 = Tab::build("Item Two", "Content Two Displayed Here");

    $return[] = TabContainer::create()
      ->addTab('itm-1', $tab)
      ->addTab('itm-2', $tab2)
      ->setActiveTabByRequest($this->getContext()->request())
      ->menuLeft();

    return $return;
  }
}
