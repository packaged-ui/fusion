<?php
namespace PackagedUi\Fusion\Demo;

use Packaged\SafeHtml\SafeHtml;
use PackagedUi\Fusion\Progress\ProgressBar;

class ProgressDemo extends DemoSection
{
  protected function _content(): SafeHtml
  {
    $return = [];
    $return[] = ProgressBar::create(50);
    return SafeHtml::escape($return);
  }
}
