<?php
namespace PackagedUi\Elegance\Demo;

use Packaged\Glimpse\Tags\Layout\Footer;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Lists\UnorderedList;
use Packaged\Glimpse\Tags\Media\Figure;
use Packaged\Glimpse\Tags\Media\FigureCaption;
use Packaged\Glimpse\Tags\Media\Image;
use Packaged\Glimpse\Tags\Text\Abbreviation;
use Packaged\Glimpse\Tags\Text\Address;
use Packaged\Glimpse\Tags\Text\BlockQuote;
use Packaged\Glimpse\Tags\Text\Citation;
use Packaged\Glimpse\Tags\Text\CodeBlock;
use Packaged\Glimpse\Tags\Text\DeletedText;
use Packaged\Glimpse\Tags\Text\HeadingFive;
use Packaged\Glimpse\Tags\Text\HeadingFour;
use Packaged\Glimpse\Tags\Text\HeadingOne;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use Packaged\Glimpse\Tags\Text\HeadingThree;
use Packaged\Glimpse\Tags\Text\HeadingTwo;
use Packaged\Glimpse\Tags\Text\ItalicText;
use Packaged\Glimpse\Tags\Text\KeyboardInput;
use Packaged\Glimpse\Tags\Text\MarkedText;
use Packaged\Glimpse\Tags\Text\NoLongerAccurateText;
use Packaged\Glimpse\Tags\Text\Paragraph;
use Packaged\Glimpse\Tags\Text\PreFormattedText;
use Packaged\Glimpse\Tags\Text\ProgramOutputText;
use Packaged\Glimpse\Tags\Text\SmallText;
use Packaged\Glimpse\Tags\Text\StrongText;
use Packaged\Glimpse\Tags\Text\UnderlinedText;
use Packaged\Glimpse\Tags\Text\Variable;
use PackagedUi\Elegance\Elegance;

class Typography extends DemoSection
{
  protected function _content()
  {
    $return = [];

    $secondary = SmallText::create('Additional text')->addClass(Elegance::TEXT_MUTED);
    $return[] = HeadingOne::create(['h1. Heading ', $secondary]);
    $return[] = HeadingTwo::create(['h2. Heading ', $secondary]);
    $return[] = HeadingThree::create(['h3. Heading ', $secondary]);
    $return[] = HeadingFour::create(['h4. Heading ', $secondary]);
    $return[] = HeadingFive::create(['h5. Heading ', $secondary]);
    $return[] = HeadingSix::create(['h6. Heading ', $secondary]);

    $return[] = HeadingOne::create('Display 1')->addClass(Elegance::DISPLAY1);
    $return[] = HeadingOne::create('Display 2')->addClass(Elegance::DISPLAY2);
    $return[] = HeadingOne::create('Display 3')->addClass(Elegance::DISPLAY3);
    $return[] = HeadingOne::create('Display 4')->addClass(Elegance::DISPLAY4);

    $lorem = 'Lorem ipsum dolor sit amet, ad tibique blandit qui, error zril eleifend ut vel. Et paulo labores molestiae has, ei eos virtute dolorem.';
    $return[] = Paragraph::create($lorem);
    $return[] = Paragraph::create($lorem)->addClass(Elegance::LEAD_TEXT);

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
        Abbreviation::create('html', 'HyperText Markup Language')->addClass(Elegance::INITIALISM),
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

    $return[] = BlockQuote::create($lorem);
    $return[] = BlockQuote::create(
      [$lorem, Footer::create(['- Someone famous in ', Citation::create('Source Title')])]
    );

    $return[] = UnorderedList::create()->addClass(Elegance::LIST_INLINE)
      ->addItem(Paragraph::create('Primary')->addClass(Elegance::TEXT_PRIMARY))
      ->addItem(Paragraph::create('Secondary')->addClass(Elegance::TEXT_SECONDARY))
      ->addItem(Paragraph::create('Success')->addClass(Elegance::TEXT_SUCCESS))
      ->addItem(Paragraph::create('Danger')->addClass(Elegance::TEXT_DANGER))
      ->addItem(Paragraph::create('Warning')->addClass(Elegance::TEXT_WARNING))
      ->addItem(Paragraph::create('Info')->addClass(Elegance::TEXT_INFO))
      ->addItem(Paragraph::create('Dark')->addClass(Elegance::TEXT_DARK))
      ->addItem(Paragraph::create('Default'))
      ->addItem(Paragraph::create('Muted')->addClass(Elegance::TEXT_MUTED))
      ->addItem(Paragraph::create('Light')->addClass(Elegance::TEXT_LIGHT))
      ->addItem(Paragraph::create('Lighter')->addClass(Elegance::TEXT_LIGHTER))
      ->addItem(Paragraph::create('Lightest')->addClass(Elegance::TEXT_LIGHTEST));

    $return[] = UnorderedList::create()
      ->addItem('Lorem ipsum dolor sit amet')
      ->addItem('Consectetur adipiscing elit')
      ->addItem('Integer molestie lorem at massa');

    $return[] = UnorderedList::create()->addClass(Elegance::LIST_UNSTYLED)
      ->addItem('Lorem ipsum dolor sit amet')
      ->addItem('Consectetur adipiscing elit')
      ->addItem('Integer molestie lorem at massa');

    $return[] = UnorderedList::create()->addClass(Elegance::LIST_INLINE)
      ->addItem('Lorem ipsum dolor sit amet')
      ->addItem('Consectetur adipiscing elit')
      ->addItem('Integer molestie lorem at massa');

    $return[] = Paragraph::create(["For exmple, ", CodeBlock::create('<section>'), ' should be wrapped as inline.']);
    $return[] = Paragraph::create(
      ["To switch directories, type ", KeyboardInput::create('cd'), ' followed by the name of the directory.']
    );
    $return[] = Paragraph::create(
      [
        "To edit settings, press ",
        KeyboardInput::create('ctrl'),
        ' + ',
        KeyboardInput::create(','),
      ]
    );
    $return[] = PreFormattedText::create('<p>Pre formatted text...</p>');
    $return[] = Paragraph::create(
      [Variable::create('y'), ' = ', Variable::create('mx'), ' + ', Variable::create('b')]
    );
    $return[] = ProgramOutputText::create('This text is meant to be treated as sample output from a computer program.');

    $return[] = Figure::forImage(Image::create('https://picsum.photos/400/200'), FigureCaption::create('Random image'));

    return $return;
  }
}
