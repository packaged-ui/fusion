<?php
namespace PackagedUi\Elegance\Demo;

use PackagedUi\Elegance\Progress\ProgressBar;

class ProgressDemo extends DemoSection
{
  protected function _content()
  {
    $return = [];
    $return[] = ProgressBar::create(50);
    return $return;
  }
}
