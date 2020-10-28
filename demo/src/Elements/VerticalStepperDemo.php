<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Glimpse\Tags\Div;
use Packaged\Glimpse\Tags\Text\HeadingFive;
use Packaged\Glimpse\Tags\Text\Paragraph;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Button\Button;
use PackagedUi\Fusion\VerticalStepper\Step;
use PackagedUi\Fusion\VerticalStepper\StepWrapper;
use PackagedUi\FusionDemo\AbstractDemoPage;

class VerticalStepperDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Vertical Stepper';
  }

  protected function _getFaIcon()
  {
    return FaIcon::GALACTIC_SENATE;
  }

  protected function _content(): array
  {
    $return = [];

    $return[] = HeadingFive::create('Default stepper wepper');
    $return[] =
      StepWrapper::create(
        Step::create(
          Paragraph::create('Order for mattcurd.co.uk'),
          Button::create('Something here')->primary()
        )->setHeader(
          Paragraph::create('Step 1'),
          Paragraph::create('Status')
        ),
        Step::create()->setHeader('Step 2')
      );

    $return[] = HeadingFive::create('Stepper with border');
    $return[] =
      StepWrapper::create(
        Step::create(
          Paragraph::create('Order for mattcurd.co.uk'),
          Button::create('Something here')->primary()
        )->setHeader(
          Paragraph::create('Step 1'),
          Paragraph::create('Status')
        ),
        Step::create()->setHeader('Step 2')
      )->border();

    $return[] = HeadingFive::create('Stepper with border + icon middle');
    $return[] =
      StepWrapper::create(
        Step::create(
          Paragraph::create('Order for mattcurd.co.uk'),
          Button::create('Something here')->primary()
        )->setHeader(
          Paragraph::create('Step 1'),
          Paragraph::create('Status')
        ),
        Step::create()->setHeader('Step 2')
      )->border()->iconMiddle();

    $return[] = HeadingFive::create('Default stepper icon position middle');
    $return[] =
      StepWrapper::create(
        Step::create()->setHeader('outer 1'),
        Div::create(
          Step::create()->setHeader('inner 1'),
          Step::create()->setHeader('inner 2'),
          Step::create()->setHeader('inner 3')
        ),
        Step::create(
          Paragraph::create('Order for mattcurd.co.uk'),
          Button::create('Something here')->primary()
        )->setHeader(
          Paragraph::create('Step 1'),
          Paragraph::create('Status')
        ),
        Step::create(
          Paragraph::create('Order for mattcurd.co.uk'),
          Button::create('Something here')->primary()
        )->setHeader(
          Paragraph::create('Step 1'),
          Paragraph::create('Status')
        )
      )->iconMiddle();

    return $return;
  }
}
