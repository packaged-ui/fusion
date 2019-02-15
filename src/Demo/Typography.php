<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Text\Abbreviation;
use Packaged\Glimpse\Tags\Text\Address;
use Packaged\Glimpse\Tags\Text\BlockQuote;
use Packaged\Glimpse\Tags\Text\DeletedText;
use Packaged\Glimpse\Tags\Text\HeadingFive;
use Packaged\Glimpse\Tags\Text\HeadingFour;
use Packaged\Glimpse\Tags\Text\HeadingOne;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use Packaged\Glimpse\Tags\Text\HeadingThree;
use Packaged\Glimpse\Tags\Text\HeadingTwo;
use Packaged\Glimpse\Tags\Text\ItalicText;
use Packaged\Glimpse\Tags\Text\MarkedText;
use Packaged\Glimpse\Tags\Text\NoLongerAccurateText;
use Packaged\Glimpse\Tags\Text\Paragraph;
use Packaged\Glimpse\Tags\Text\SmallText;
use Packaged\Glimpse\Tags\Text\StrongText;
use Packaged\Glimpse\Tags\Text\UnderlinedText;

class Typography extends DemoSection
{
  public function __construct()
  {
    ResourceManager::resources()->requireCss('css/typography.css');
  }

  protected function _content()
  {
    $return = [];

    $secondary = SmallText::create('Secondary text')->addClass('text-muted');
    $return[] = HeadingOne::create(['h1. Heading ', $secondary]);
    $return[] = HeadingTwo::create(['h2. Heading ', $secondary]);
    $return[] = HeadingThree::create(['h3. Heading ', $secondary]);
    $return[] = HeadingFour::create(['h4. Heading ', $secondary]);
    $return[] = HeadingFive::create(['h5. Heading ', $secondary]);
    $return[] = HeadingSix::create(['h6. Heading ', $secondary]);

    $return[] = HeadingOne::create('Display 1')->addClass('display-1');
    $return[] = HeadingOne::create('Display 2')->addClass('display-2');
    $return[] = HeadingOne::create('Display 3')->addClass('display-3');
    $return[] = HeadingOne::create('Display 4')->addClass('display-4');

    $lorem = 'Lorem ipsum dolor sit amet, ad tibique blandit qui, error zril eleifend ut vel. Et paulo labores molestiae has, ei eos virtute dolorem.';
    $return[] = Paragraph::create($lorem);
    $return[] = Paragraph::create($lorem)->addClass('lead');

    $return[] = Paragraph::create(['You can use the mark tag to ', MarkedText::create('highlight'), ' text']);
    $return[] = Paragraph::create(DeletedText::create('This line of text is meant to be treated as deleted text.'));
    $return[] = Paragraph::create(
      NoLongerAccurateText::create('This line of text is meant to be treated as no longer accurate.')
    );
    $return[] = Paragraph::create(UnderlinedText::create('This line of text will render as underlined'));
    $return[] = Paragraph::create(SmallText::create('This line of text is meant to be treated as fine print.'));
    $return[] = Paragraph::create(StrongText::create('rendered as bold text'));
    $return[] = Paragraph::create(ItalicText::create('rendered as italicized text'));
    $return[] = Paragraph::create(
      ['An abbreviation of the word attribute is ', Abbreviation::create('attr', 'abbreviation'), '.']
    );
    $return[] = Paragraph::create(
      [
        Abbreviation::create('html', 'HyperText Markup Language')->addClass('initialism'),
        ' is the best thing since sliced bread.',
      ]
    );

    $return[] = Address::create(
      [
        StrongText::create("Twitter, Inc."),
        LineBreak::create(),
        "1355 Market Street, Suite 900",
        LineBreak::create(),
        "San Francisco, CA 94103",
        LineBreak::create(),
        Abbreviation::create('P:', 'Phone'),
        " (123) 456-789",
      ]
    );

    $return[] = BlockQuote::create($lorem)->addClass('blockquote');

    return $return;
  }
}
