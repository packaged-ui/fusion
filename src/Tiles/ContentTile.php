<?php
namespace PackagedUi\Fusion\Tiles;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\LineBreak;

class ContentTile extends Tile
{
  protected function _produceDescription()
  {
    if(is_string($this->getDescription()))
    {
      $return = [];
      $desc = $this->getDescription();
      $lines = explode("\n", $desc);
      foreach($lines as $line)
      {
        $return[] = $line;
        $return[] = new LineBreak();
      }
      return $return;
    }
    return $this->getDescription();
  }

  protected function _setDescription(HtmlTag $description, HtmlTag $primary, HtmlTag $heading, HtmlTag $text)
  {
    $primary->appendContent($description);
    return $this;
  }

  protected function _getContentForRender()
  {
    $tile = parent::_getContentForRender();
    $tile->addClass("content-tile");
    return $tile;
  }
}
