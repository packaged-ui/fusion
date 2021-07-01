<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Core\HtmlTag;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Progress\ProgressBar;

class ProgressDemo extends AbstractDemoElement
{
  public function getName(): string
  {
    return 'Progress';
  }

  protected function _getFaIcon()
  {
    return FaIcon::SPINNER;
  }

  /**
   * Example of the default Progress Bar
   *
   * @return HtmlTag
   */
  final public function DefaultProgressBar()
  {
    return ProgressBar::create(50);
  }

  /**
   * All of the Circular Progress Bar
   *
   * @return HtmlTag
   */
  final public function CircularProgressBar()
  {
    return ProgressBar::create(68)->circle();
  }

  /**
   * All of the Circular Progress Bar
   *
   * @return array
   */
  final public function AllCircularProgressBar()
  {
    $return = [];
    for($x = 1; $x <= 100; $x++)
    {
      $return[] = ProgressBar::create($x)->circle();
    }
    return $return;
  }
}
