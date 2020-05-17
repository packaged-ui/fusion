<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\Div;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Banner\Banner;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\FusionDemo\AbstractDemoPage;

class BannerDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Banners';
  }

  protected function _getFaIcon()
  {
    return FaIcon::CHALKBOARD;
  }

  public function __construct()
  {

    ResourceManager::inline()->requireCss(
      "
    .banner-placement{
      min-height: 200px;
      background: #f7f7f7;
      border:1px solid black;
      position:relative;
      margin:10px;
    }
    "
    );
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = Banner::create("One line text string with no actions");

    $return[] = Banner::create("One line text string with one action")
      ->addButton(Button::create("Dismiss")->primary()->flat());

    $return[] = Banner::create("One line text string with one action")
      ->addButton(Button::create("Dismiss")->primary()->flat())->fullWidth();

    $return[] = Banner::create("One line text string with one action")
      ->addButton(Button::create("Dismiss")->primary()->flat())
      ->setIcon(FaIcon::create(FaIcon::CHALKBOARD)->sizeLarge());

    $return[] = Banner::create("One line text string with two actions")
      ->addButton(Button::create("Go Live")->primary()->flat())
      ->addButton(Button::create("Dismiss")->primary()->flat())
      ->setIcon(FaIcon::create(FaIcon::CHALKBOARD)->sizeLarge());

    $return[] = Banner::create("One line text string with two actions, wrapped buttons")
      ->addButton(Button::create("Go Live")->primary()->flat())
      ->addButton(Button::create("Dismiss")->primary()->flat())
      ->setIcon(FaIcon::create(FaIcon::CHALKBOARD)->sizeLarge());

    $return[] = Banner::create("One line text string with two actions, wrapped buttons")
      ->addButton(Button::create("Go Live")->primary()->flat())
      ->addButton(Button::create("Dismiss")->primary()->flat())
      ->setIcon(FaIcon::create(FaIcon::CHALKBOARD)->sizeLarge())->fullWidth();

    $return[] = $this->_placementWrapper(Banner::create("Default Placement"));
    $return[] = $this->_placementWrapper(Banner::create("Top Placement")->top());
    $return[] = $this->_placementWrapper(Banner::create("Bottom Placement")->bottom());

    $return[] = $this->_placementWrapper(Banner::create("Default Placement")->shadow());
    $return[] = $this->_placementWrapper(Banner::create("Top Placement")->top()->shadow());
    $return[] = $this->_placementWrapper(Banner::create("Bottom Placement")->bottom()->shadow());

    return $return;
  }

  protected function _placementWrapper(Banner $banner)
  {
    return Div::create($banner)->addClass('banner-placement');
  }
}
