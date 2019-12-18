<?php
namespace PackagedUi\Fusion;

use Packaged\Dispatch\Component\DispatchableComponent;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use PackagedUi\Fusion\Layout\TableInterface;

class Fusion implements LayoutInterface, TypographyInterface, ButtonInferface, BadgeInterface,
                        TableInterface, ThemeInterface, ListInterface, DispatchableComponent
{
  const FILE_BASE_CSS = 'css/base.min.css';
  const FILE_BASE_JS = 'js/base.min.js';

  public static function includeGoogleFont(
    $family = 'Roboto', $styles = '300,300i,400,400i,500,500i,700,700i,900', $fontDisplay = 'swap', $options = null,
    int $priority = ResourceStore::PRIORITY_LOW
  )
  {
    return ResourceManager::external()->includeCss(
      'https://fonts.googleapis.com/css?family=' . $family
      . ($styles ? ':' . $styles : '')
      . ($fontDisplay ? '&display=' . $fontDisplay : ''),
      $options,
      $priority
    );
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
