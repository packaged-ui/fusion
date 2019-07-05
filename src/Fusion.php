<?php
namespace PackagedUi\Fusion;

use Packaged\Dispatch\Component\DispatchableComponent;
use Packaged\Dispatch\ResourceManager;
use PackagedUi\Fusion\Layout\TableInterface;

class Fusion implements LayoutInterface, TypographyInterface, ButtonInferface, BadgeInterface,
                        TableInterface, ThemeInterface, ListInterface, DispatchableComponent
{
  const FILE_BASE_CSS = 'css/base.min.css';
  const FILE_BASE_JS = 'js/base.min.js';

  public static function includeGoogleFont(
    $family = 'Roboto', $styles = '300,300i,400,400i,500,500i,700,700i,900', $fontDisplay = 'swap'
  )
  {
    ResourceManager::external()->includeCss(
      'https://fonts.googleapis.com/css?family=' . $family
      . ($styles ? ':' . $styles : '')
      . ($fontDisplay ? '&display=' . $fontDisplay : '')
    );
  }

  public static function requireCss()
  {
    ResourceManager::componentClass(static::class)->requireCss(self::FILE_BASE_CSS);
  }

  public static function requireJs()
  {
    ResourceManager::componentClass(static::class)->requireJs(self::FILE_BASE_JS);
  }
}
