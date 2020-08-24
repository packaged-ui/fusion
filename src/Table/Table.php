<?php
namespace PackagedUi\Fusion\Table;

use PackagedUi\Fusion\Fusion;

class Table extends \Packaged\Glimpse\Tags\Table\Table
{
  public function striped()
  {
    $this->addClass(Fusion::TABLE_STRIPED);
    return $this;
  }

  public function bordered()
  {
    $this->addClass(Fusion::TABLE_BORDERED);
    return $this;
  }

  public function fixed()
  {
    $this->addClass(Fusion::TABLE_FIXED);
    return $this;
  }
}
