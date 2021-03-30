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

  const FILE_BASE_IE_CSS = 'fusion.ie.min.css';
  const FILE_BASE_IE_JS = 'fusion.ie.min.js';

  const GOOGLE_FONT_STYLES = 'ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,300;1,400;1,500;1,600;1,700';

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
    return 'https://fonts.googleapis.com/css2'
      . '?family=' . $family . ($styles ? ':' . $styles : '')
      . ($display ? '&display=' . $display : '');
  }

  public static function require()
  {
    static::requireCss();
    static::requireJs();
  }

  protected static function _userAgent()
  {
    return $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
  }

  public static function resourceManager(): ResourceManager
  {
    return ResourceManager::componentClass(self::class);
  }

  protected static function _isIe(): bool
  {
    $ua = static::_userAgent();
    return strpos($ua, 'Trident/') > -1;
  }

  protected static function _ieOverrides(): bool
  {
    return false;
  }

  public static function requireCss()
  {
    $ie = static::_ieOverrides() && static::_isIe();
    static::resourceManager()->requireCss($ie ? static::FILE_BASE_IE_CSS : static::FILE_BASE_CSS);
  }

  public static function requireJs()
  {
    $ie = static::_ieOverrides() && static::_isIe();
    static::resourceManager()->requireJs($ie ? static::FILE_BASE_IE_JS : static::FILE_BASE_JS);
  }
}
