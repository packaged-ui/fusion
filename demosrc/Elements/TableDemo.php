<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Table\TableBody;
use Packaged\Glimpse\Tags\Table\TableCell;
use Packaged\Glimpse\Tags\Table\TableHead;
use Packaged\Glimpse\Tags\Table\TableHeading;
use Packaged\Glimpse\Tags\Table\TableRow;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Card\Card;
use PackagedUi\Fusion\Table\Table;
use PackagedUi\FusionDemo\AbstractDemoPage;

class TableDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Tables';
  }

  protected function _getFaIcon()
  {
    return FaIcon::TABLE;
  }

  protected function _content(): array
  {
    $return = [];

    $headings = ['Date', 'Unique Visits', 'Views', 'Price', 'Sales'];
    $cells = [
      ['05/18/2017', '2,341', '4,999', '$244.48', '23'],
      ['05/19/2017', '4,331', '9,495', '$344.48', '43'],
      ['05/20/2017', '1,231', '2,914', '$34.98', '413'],
    ];

    $return[] = Card::create(
      Table::create(
        [
          TableHead::create(TableHeading::collection($headings)),
          TableBody::create(
            TableRow::create(TableCell::collection($cells[0])),
            TableRow::create(TableCell::collection($cells[1])),
            TableRow::create(TableCell::collection($cells[2]))
          ),
        ]
      )
    )->disableContentContainer();

    $return[] = LineBreak::create();

    $return[] = Card::create(
      Table::create(
        [
          TableHead::create(TableHeading::collection($headings)),
          TableBody::create(
            TableRow::create(TableCell::collection($cells[0])),
            TableRow::create(TableCell::collection($cells[1])),
            TableRow::create(TableCell::collection($cells[2]))
          ),
        ]
      )->striped()
    )->disableContentContainer();

    $return[] = LineBreak::create();

    $return[] = Card::create(
      Table::create(
        [
          TableHead::create(TableHeading::collection($headings)),
          TableBody::create(
            TableRow::create(TableCell::collection($cells[0])),
            TableRow::create(TableCell::collection($cells[1])),
            TableRow::create(TableCell::collection($cells[2]))
          ),
        ]
      )->bordered()
    )->disableContentContainer();

    $return[] = LineBreak::create();

    $return[] = Card::create(
      Table::create(
        [
          TableHead::create(TableHeading::collection($headings)),
          TableBody::create(
            TableRow::create(TableCell::collection($cells[0])),
            TableRow::create(TableCell::collection($cells[1])),
            TableRow::create(TableCell::collection($cells[2]))
          ),
        ]
      )->bordered()->striped()
    )->disableContentContainer();

    return $return;
  }
}
