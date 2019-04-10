<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;

class GridCell extends Div
{
  const CLASS_ALIGN_TOP = 'grid__cell--align-top';
  const CLASS_ALIGN_MIDDLE = 'grid__cell--align-middle';
  const CLASS_ALIGN_BOTTOM = 'grid__cell--align-bottom';

  const DEVICE_DESKTOP = 'desktop';
  const DEVICE_TABLET = 'tablet';
  const DEVICE_PHONE = 'phone';

  protected $_sizes = [];

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('grid__cell');

    foreach($this->_sizes as $device => $span)
    {
      $ele->addClass('grid__cell--span-' . $span . (empty($device) ? '' : '-' . $device));
    }

    return $ele;
  }

  public static function collectionSized(
    array $items, $span = null, $desktopSpan = null, $tabletSpan = null, $phoneSpan = null
  )
  {
    $return = [];
    foreach($items as $item)
    {
      if($item instanceof static)
      {
        $return[] = $item;
      }
      else
      {
        $return[] = static::createSized($item, $span, $desktopSpan, $tabletSpan, $phoneSpan);
      }
    }
    return $return;
  }

  public static function createSized(
    $content = '', $span = null, $desktopSpan = null, $tabletSpan = null, $phoneSpan = null
  )
  {
    /** @var static $return */
    $return = parent::create($content);
    $return->setSize($span);
    $return->setSizes($desktopSpan, $tabletSpan, $phoneSpan);
    return $return;
  }

  public function setSize($size, $deviceType = null)
  {
    if($size !== null && $size >= 1 && $size <= 12)
    {
      $this->_sizes[$deviceType ?? ''] = $size;
    }
    return $this;
  }

  public function setSizes($desktop, $tablet, $phone = null)
  {
    $this->setDesktopSize($desktop);
    $this->setTabletSize($tablet);
    $this->setPhoneSize($phone ?? $tablet);
    return $this;
  }

  public function setDesktopSize($size)
  {
    return $this->setSize($size, self::DEVICE_DESKTOP);
  }

  public function setTabletSize($size)
  {
    return $this->setSize($size, self::DEVICE_TABLET);
  }

  public function setPhoneSize($size)
  {
    return $this->setSize($size, self::DEVICE_PHONE);
  }
}
