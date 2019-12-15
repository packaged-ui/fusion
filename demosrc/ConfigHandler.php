<?php
namespace PackagedUi\FusionDemo;

use Packaged\Context\Context;
use Packaged\Context\ContextAware;
use Packaged\Context\ContextAwareTrait;
use Packaged\Dispatch\ResourceManager;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Fusion;
use PackagedUi\FusionDemo\Elements\BadgeDemo;
use PackagedUi\FusionDemo\Elements\ButtonDemo;
use PackagedUi\FusionDemo\Elements\CardDemo;
use PackagedUi\FusionDemo\Elements\ColorDemo;
use PackagedUi\FusionDemo\Elements\DrawerDemo;
use PackagedUi\FusionDemo\Elements\GridDemo;
use PackagedUi\FusionDemo\Elements\InputDemo;
use PackagedUi\FusionDemo\Elements\LayoutDemo;
use PackagedUi\FusionDemo\Elements\ListDemo;
use PackagedUi\FusionDemo\Elements\MenuDemo;
use PackagedUi\FusionDemo\Elements\ProgressDemo;
use PackagedUi\FusionDemo\Elements\StatisticsDemo;
use PackagedUi\FusionDemo\Elements\TableDemo;
use PackagedUi\FusionDemo\Elements\ThemeDemo;
use PackagedUi\FusionDemo\Elements\TileDemo;
use PackagedUi\FusionDemo\Elements\TypographyDemo;
use PackagedUi\FusionDemo\Layout\Layout;

class ConfigHandler implements ContextAware
{
  use ContextAwareTrait;

  public function setContext(Context $context)
  {
    $this->_context = $context;
    $context->events()->listen(Layout::RENDER_EVENT, [$this, 'includeUi']);
    return $this;
  }

  public function includeUi()
  {
    Fusion::includeGoogleFont();
    Fusion::require();
    ResourceManager::vendor('packaged-ui', 'fontawesome')->requireCss(FaIcon::CSS_PATH);
  }

  /**
   * @return UiPage[]
   */
  public function getPages(): array
  {
    return [
      new TypographyDemo(),
      new ColorDemo(),
      new GridDemo(),
      new ThemeDemo(),
      new DrawerDemo(),
      new BadgeDemo(),
      new ButtonDemo(),
      new CardDemo(),
      new InputDemo(),
      new LayoutDemo(),
      new ListDemo(),
      new MenuDemo(),
      new ProgressDemo(),
      new StatisticsDemo(),
      new TableDemo(),
      new TileDemo(),
    ];
  }
}
