<?php
namespace PackagedUi\Fusion;

use Packaged\Dispatch\Component\DispatchableComponent;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use PackagedUi\Fusion\Badge\BadgeInterface;
use PackagedUi\Fusion\Button\ButtonInterface;
use PackagedUi\Fusion\Layout\LayoutInterface;
use PackagedUi\Fusion\Lists\ListInterface;
use PackagedUi\Fusion\Table\TableInterface;
use PackagedUi\Fusion\Theme\ThemeInterface;
use PackagedUi\Fusion\Typography\TypographyInterface;

class Fusion implements LayoutInterface, TypographyInterface, ButtonInterface, BadgeInterface,
                        TableInterface, ThemeInterface, ListInterface, DispatchableComponent
{
  const FILE_BASE_CSS = 'fusion.min.css';
  const FILE_BASE_JS = 'fusion.min.js';

  const GOOGLE_FONT_STYLES = '300,300i,400,400i,500,500i,600,600i,700,700i,900';

  public static function includeGoogleFont(
    $family = 'Roboto', $styles = self::GOOGLE_FONT_STYLES, $display = 'swap', $options = null,
    int $priority = ResourceStore::PRIORITY_LOW
  )
  {
    return ResourceManager::external()
      ->includeCss(static::googleFontUrl($family, $styles, $display), $options, $priority);
  }

  public static function googleFontUrl($family = 'Roboto', $styles = self::GOOGLE_FONT_STYLES, $display = 'swap')
  {
    return 'https://fonts.googleapis.com/css'
      . '?family=' . $family . ($styles ? ':' . $styles : '')
      . ($display ? '&display=' . $display : '');
  }

  public static function require()
  {
    static::requireCss();
    static::requireJs();
  }

  public static function requireCss()
  {
    ResourceManager::componentClass(self::class)->requireCss(self::FILE_BASE_CSS);
  }

  public static function requireJs()
  {
    ResourceManager::componentClass(self::class)->requireJs(self::FILE_BASE_JS);
  }
}
