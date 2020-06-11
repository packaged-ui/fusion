<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Text\BoldText;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Fusion;
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
    $return = [];
    $tab = Tab::build("Item One", "Content One Displayed Here");
    $tab2 = Tab::build("Item Two", "Content Two Displayed Here");
    $return[] = TabContainer::create()
      ->addTab('itm-1', $tab)
      ->addTab('itm-2', $tab2)
      ->setActiveTabByRequest($this->getContext()->request());

    $return[] = LineBreak::create();

    $return[] = TabContainer::create()
      ->addTab('itm-1', $tab)
      ->addTab('itm-2', $tab2)
      ->menuBottom()
      ->setActiveTabByRequest($this->getContext()->request());

    $return[] = LineBreak::create();

    $return[] = TabContainer::create()
      ->addTab('itm-1', $tab)
      ->addTab('itm-2', $tab2)
      ->menuBottom()->setMenuPrefix(BoldText::create("Pick Your Tabs")->addClass(Fusion::TEXT_CENTER))
      ->setActiveTabByRequest($this->getContext()->request());
    return $return;
  }
}
