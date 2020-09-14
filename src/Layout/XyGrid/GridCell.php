<?php
namespace PackagedUi\Fusion\Layout\XyGrid;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class GridCell extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  const DEVICE_DESKTOP = 'large';
  const DEVICE_TABLET = 'medium';
  const DEVICE_PHONE = 'small';

  protected $_sizes = [];

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return 'cell';
  }

  public function setSizes(int $desktop, int $tablet = 0, int $phone = 0)
  {
    $this->setDesktopSize($desktop);
    $this->setTabletSize($tablet);
    $this->setPhoneSize($phone);
    return $this;
  }

  public function setDesktopSize(int $size = 0)
  {
    return $this->setSize($size, self::DEVICE_DESKTOP);
  }

  public function setSize(int $size, string $deviceType)
  {
    if($size !== null && $size >= 1 && $size <= 12)
    {
      $this->_sizes[$deviceType ?? ''] = $size;
    }

    return $this;
  }

  public function setTabletSize(int $size = 0)
  {
    return $this->setSize($size, self::DEVICE_TABLET);
  }

  public function setPhoneSize(int $size = 0)
  {
    return $this->setSize($size, self::DEVICE_PHONE);
  }

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();
    foreach($this->_sizes as $device => $size)
    {
      $ele->addClass($device . '-' . $size);
    }
    return $ele;
  }

}
