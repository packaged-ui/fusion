<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Layout\Footer;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Lists\ListItem;
use Packaged\Glimpse\Tags\Lists\OrderedList;
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
use Packaged\Glimpse\Tags\Text\EmphasizedText;
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
use PackagedUi\Fusion\Fusion;

class TypographyDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];

    $secondary = SmallText::create('Additional text')->addClass(Fusion::TEXT_MEDIUM_EMPHASIS);
    $return[] = HeadingOne::create(['h1. Heading ', $secondary]);
    $return[] = HeadingTwo::create(['h2. Heading ', $secondary]);
    $return[] = HeadingThree::create(['h3. Heading ', $secondary]);
    $return[] = HeadingFour::create(['h4. Heading ', $secondary]);
    $return[] = HeadingFive::create(['h5. Heading ', $secondary]);
    $return[] = HeadingSix::create(['h6. Heading ', $secondary]);

    $return[] = HeadingOne::create('Display 1')->addClass(Fusion::DISPLAY1);
    $return[] = HeadingOne::create('Display 2')->addClass(Fusion::DISPLAY2);
    $return[] = HeadingOne::create('Display 3')->addClass(Fusion::DISPLAY3);
    $return[] = HeadingOne::create('Display 4')->addClass(Fusion::DISPLAY4);
    $return[] = Link::create("#", 'Link');

    $lorem = 'Lorem ipsum dolor sit amet, ad tibique blandit qui, error zril eleifend ut vel. Et paulo labores molestiae has, ei eos virtute dolorem.';
    $return[] = Paragraph::create($lorem);
    $return[] = Paragraph::create($lorem)->addClass(Fusion::LEAD_TEXT);

    $return[] = Paragraph::create(['You can use the mark tag to ', MarkedText::create('highlight'), ' text']);
    $return[] = Paragraph::create(DeletedText::create('This line of text is meant to be treated as deleted text.'));
    $return[] = Paragraph::create(
      NoLongerAccurateText::create('This line of text is meant to be treated as no longer accurate.')
    );
    $return[] = Paragraph::create(UnderlinedText::create('This line of text will render as underlined'));
    $return[] = Paragraph::create(SmallText::create('This line of text is meant to be treated as fine print.'));
    $return[] = Paragraph::create(StrongText::create('rendered as bold text'));
    $return[] = Paragraph::create(EmphasizedText::create('rendered as emphasized text'));
    $return[] = Paragraph::create(ItalicText::create('rendered as italicized text'));
    $return[] = Paragraph::create(
      ['An abbreviation of the word attribute is ', Abbreviation::create('attr', 'abbreviation'), '.']
    );
    $return[] = Paragraph::create(
      [
        Abbreviation::create('html', 'HyperText Markup Language')->addClass(Fusion::INITIALISM),
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

    $return[] = UnorderedList::create()->addClass(Fusion::LIST_INLINE)
      ->addItem(Paragraph::create('Primary')->addClass(Fusion::THEME_PRIMARY))
      ->addItem(Paragraph::create('Accent')->addClass(Fusion::THEME_ACCENT))
      ->addItem(Paragraph::create('Success')->addClass(Fusion::TEXT_SUCCESS))
      ->addItem(Paragraph::create('Danger')->addClass(Fusion::TEXT_DANGER))
      ->addItem(Paragraph::create('Warning')->addClass(Fusion::TEXT_WARNING))
      ->addItem(Paragraph::create('Info')->addClass(Fusion::TEXT_INFO))
      ->addItem(Paragraph::create('Default'))
      ->addItem(Paragraph::create('Opaque')->addClass(Fusion::TEXT_OPAQUE))
      ->addItem(Paragraph::create('High Emphasis')->addClass(Fusion::TEXT_HIGH_EMPHASIS))
      ->addItem(Paragraph::create('Medium Emphasis')->addClass(Fusion::TEXT_MEDIUM_EMPHASIS))
      ->addItem(Paragraph::create('Disabled')->addClass(Fusion::TEXT_DISABLED));

    $return[] = UnorderedList::create()->addClass(Fusion::LIST_UNSTYLED)
      ->addItem(Paragraph::create([CodeBlock::create('.text-tiny'), ' - Text Tiny'])->addClass(Fusion::TEXT_TINY))
      ->addItem(Paragraph::create([CodeBlock::create('.text-big'), ' - Text Big'])->addClass(Fusion::TEXT_BIG))
      ->addItem(Paragraph::create([CodeBlock::create('.text-large'), ' - Text Large'])->addClass(Fusion::TEXT_LARGE))
      ->addItem(
        Paragraph::create([CodeBlock::create('.text-xlarge'), ' - Text Extra Large'])->addClass(Fusion::TEXT_XLARGE)
      );

    $return[] = UnorderedList::create()->addClass(Fusion::LIST_UNSTYLED)
      ->addItem(
        Paragraph::create([CodeBlock::create('.font-weight-bolder'), ' - Bolder'])->addClass(
          Fusion::FONT_WEIGHT_BOLDER
        )
      )
      ->addItem(
        Paragraph::create([CodeBlock::create('.font-weight-semibold'), ' - Semibold'])->addClass(
          Fusion::FONT_WEIGHT_SEMIBOLD
        )
      )
      ->addItem(
        Paragraph::create([CodeBlock::create('.font-weight-light'), ' - Light'])->addClass(Fusion::FONT_WEIGHT_LIGHT)
      );

    $return[] = UnorderedList::create()
      ->addItem('Unordered List')
      ->addItem('Lorem ipsum dolor sit amet')
      ->addItem(
        ListItem::create(["List Item", UnorderedList::create()->addItems(ListItem::collection(["A", "B", "C"]))])
      )
      ->addItem('Integer molestie lorem at massa');

    $return[] = OrderedList::create()
      ->addItem('Unordered List')
      ->addItem('Lorem ipsum dolor sit amet')
      ->addItem('Consectetur adipiscing elit')
      ->addItem('Integer molestie lorem at massa');

    $return[] = UnorderedList::create()->addClass(Fusion::LIST_UNSTYLED)
      ->addItem('Lorem ipsum dolor sit amet')
      ->addItem('Consectetur adipiscing elit')
      ->addItem('Integer molestie lorem at massa');

    $return[] = UnorderedList::create()->addClass(Fusion::LIST_INLINE)
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

    $return[] = Div::create(
      Figure::forImage(Image::create('https://picsum.photos/400/200'), FigureCaption::create('Random image'))
    );

    return $return;
  }
}
