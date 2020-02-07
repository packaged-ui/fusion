<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class GridCell extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function getBlockName(): string
  {
    return 'grid__cell';
  }

  const ALIGN_TOP = 'align-top';
  const ALIGN_MIDDLE = 'align-middle';
  const ALIGN_BOTTOM = 'align-bottom';

  const DEVICE_DESKTOP = 'desktop';
  const DEVICE_TABLET = 'tablet';
  const DEVICE_PHONE = 'phone';

  protected $_sizes = [];

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();

    foreach($this->_sizes as $device => $span)
    {
      $ele->addClass($this->getModifier('span-' . $span . (empty($device) ? '' : '-' . $device)));
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

  public function alignTop()
  {
    return $this->addModifier(self::ALIGN_TOP);
  }

  public function alignMiddle()
  {
    return $this->addModifier(self::ALIGN_MIDDLE);
  }

  public function alignBottom()
  {
    return $this->addModifier(self::ALIGN_BOTTOM);
  }
}
