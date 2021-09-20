<?php

namespace PackagedUi\FusionDemo\Elements;

use Packaged\DocBlock\DocBlockParser;
use Packaged\Glimpse\Core\AbstractContainerTag;
use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Link;
use Packaged\Glimpse\Tags\Text\CodeBlock;
use Packaged\Glimpse\Tags\Text\HeadingFour;
use Packaged\Glimpse\Tags\Text\HeadingSix;
use Packaged\Glimpse\Tags\Text\Paragraph;
use Packaged\Glimpse\Tags\Text\PreFormattedText;
use Packaged\Helpers\Strings;
use Packaged\SafeHtml\SafeHtml;
use PackagedUi\FusionDemo\AbstractDemoPage;
use ReflectionMethod;

abstract class AbstractDemoElement extends AbstractDemoPage
{

  protected function _content(): array { return []; }

  /**
   * Automatically build the available UI parts based on methods in the class
   * grouping by the docblock @group
   *
   * @return array
   */
  public function getMethods(): array
  {
    $methods = [];
    $reflect = new \ReflectionObject($this);
    foreach($reflect->getMethods(\ReflectionMethod::IS_FINAL) as $method)
    {
      $methods[] = $method->name;
    }
    return $methods;
  }

  /**
   * @return SafeHtml
   * @throws \ReflectionException
   */
  protected function _produceHtml(): SafeHtml
  {
    $output = new Div();
    $methods = $this->getMethods();

    $output->appendContent(Div::create($this->_content())->addClass('content-container'));

    foreach($methods as $method)
    {
      $reflect = new \ReflectionMethod($this, $method);
      $parsed = new DocBlockParser($reflect->getDocComment());
      $codeMethod = $this->_getCode($reflect);

      $id = Strings::randomString(4);

      $header = Div::create()->addClass('content-header__head');

      $header->appendContent(
        HeadingFour::create(Strings::titleize(preg_replace('/(\d)([A-Z])/', '$1 $2', $method)))
      );

      $header->appendContent(
        HeadingSix::create(
          Link::create('#', 'Show PHP')
            ->setAttribute(
              'onclick',
              'document.getElementById(\'code-' . $id . '\').classList.toggle(\'hidden\'); return false'
            )
        )
      );

      $header->appendContent(
        HeadingSix::create(
          Link::create('#', 'Show HTML')
            ->setAttribute(
              'onclick',
              'document.getElementById(\'html-' . $id . '\').classList.toggle(\'hidden\'); return false'
            )
        )
      );

      $summary = null;

      if($parsed->getSummary())
      {
        $summary = Paragraph::create($parsed->getSummary());
      }

      $header = Div::create($header, $summary)->addClass('content-header');

      $code = CodeBlock::create('<?php ' . $codeMethod)->addClass('language-php');

      $dom = new \DOMDocument('1.0', 'UTF-8');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;

      $dom->loadHTML(AbstractContainerTag::create($this->$method())->render(), LIBXML_NOERROR);

      $html = CodeBlock::create($dom->saveHTML($dom->documentElement))->addClass('language-html');

      $methRow = Div::create()->addClass('content-container');
      $methRow->appendContent($header);

      $methRow->appendContent(
        Div::create()
          ->appendContent(PreFormattedText::create($html))
          ->addClass('hidden', 'html-code-block')
          ->setId('html-' . $id)
      );

      $methRow->appendContent(
        Div::create()
          ->appendContent(PreFormattedText::create($code))
          ->addClass('hidden')
          ->setId('code-' . $id)
      );

      $methRow->appendContent(Div::create($this->$method())->addClass('content-main'));

      $output->appendContent($methRow);
    }

    return SafeHtml::escape($output);
  }

  /**
   * @param ReflectionMethod $method
   *
   * @return string|string[]|null
   */
  protected function _getCode(ReflectionMethod $method)
  {
    $filename = $method->getFileName();
    $startLine = $method->getStartLine() + 1;
    $endLine = $method->getEndLine() - 1;
    $length = $endLine - $startLine;

    $source = file($filename);

    return preg_replace(
      '/^\s{4}/m',
      '',
      implode("", array_slice($source, $startLine, $length))
    );
  }

  public function render(): string
  {
    return $this->_produceHtml();
  }
}
