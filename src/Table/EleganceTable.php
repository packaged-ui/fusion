<?php
namespace PackagedUi\Elegance\Table;

use Packaged\Glimpse\Tags\Table\Table;
use PackagedUi\Elegance\Elegance;

class EleganceTable extends Table
{
  public function striped()
  {
    $this->addClass(Elegance::TABLE_STRIPED);
    return $this;
  }

  public function bordered()
  {
    $this->addClass(Elegance::TABLE_BORDERED);
    return $this;
  }
}
