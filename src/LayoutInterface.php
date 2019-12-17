<?php
namespace PackagedUi\Fusion;

interface LayoutInterface
{
  const DISPLAY_INLINE_BLOCK = 'dib';
  const DISPLAY_BLOCK = 'db';
  const DISPLAY_FLEX = 'df';
  const DISPLAY_NONE = 'dn';
  const DISPLAY_FLEX_GROW = 'df--grow';

  const PADDING_EXTRA_LARGE = 'pxl';
  const PADDING_LARGE = 'pl';
  const PADDING_MEDIUM = 'pm';
  const PADDING_SMALL = 'ps';
  const PADDING_EXTRA_SMALL = 'pxs';
  const PADDING_NONE = 'pn';

  const PADDING_RIGHT_EXTRA_LARGE = 'pxl-r';
  const PADDING_RIGHT_LARGE = 'pl-r';
  const PADDING_RIGHT_MEDIUM = 'pm-r';
  const PADDING_RIGHT_SMALL = 'ps-r';
  const PADDING_RIGHT_EXTRA_SMALL = 'pxs-r';
  const PADDING_RIGHT_NONE = 'pn-r';

  const PADDING_LEFT_EXTRA_LARGE = 'pxl-l';
  const PADDING_LEFT_LARGE = 'pl-l';
  const PADDING_LEFT_MEDIUM = 'pm-l';
  const PADDING_LEFT_SMALL = 'ps-l';
  const PADDING_LEFT_EXTRA_SMALL = 'pxs-l';
  const PADDING_LEFT_NONE = 'pn-l';

  const PADDING_TOP_EXTRA_LARGE = 'pxl-t';
  const PADDING_TOP_LARGE = 'pl-t';
  const PADDING_TOP_MEDIUM = 'pm-t';
  const PADDING_TOP_SMALL = 'ps-t';
  const PADDING_TOP_EXTRA_SMALL = 'pxs-t';
  const PADDING_TOP_NONE = 'pn-t';

  const PADDING_BOTTOM_EXTRA_LARGE = 'pxl-b';
  const PADDING_BOTTOM_LARGE = 'pl-b';
  const PADDING_BOTTOM_MEDIUM = 'pm-b';
  const PADDING_BOTTOM_SMALL = 'ps-b';
  const PADDING_BOTTOM_EXTRA_SMALL = 'pxs-b';
  const PADDING_BOTTOM_NONE = 'pn-b';

  const MARGIN_EXTRA_LARGE = 'mxl';
  const MARGIN_LARGE = 'ml';
  const MARGIN_MEDIUM = 'mm';
  const MARGIN_SMALL = 'ms';
  const MARGIN_EXTRA_SMALL = 'mxs';
  const MARGIN_NONE = 'mn';

  const MARGIN_RIGHT_EXTRA_LARGE = 'mxl-r';
  const MARGIN_RIGHT_LARGE = 'ml-r';
  const MARGIN_RIGHT_MEDIUM = 'mm-r';
  const MARGIN_RIGHT_SMALL = 'ms-r';
  const MARGIN_RIGHT_EXTRA_SMALL = 'mxs-r';
  const MARGIN_RIGHT_NONE = 'mn-r';

  const MARGIN_LEFT_EXTRA_LARGE = 'mxl-l';
  const MARGIN_LEFT_LARGE = 'ml-l';
  const MARGIN_LEFT_MEDIUM = 'mm-l';
  const MARGIN_LEFT_SMALL = 'ms-l';
  const MARGIN_LEFT_EXTRA_SMALL = 'mxs-l';
  const MARGIN_LEFT_NONE = 'mn-l';

  const MARGIN_TOP_EXTRA_LARGE = 'mxl-t';
  const MARGIN_TOP_LARGE = 'ml-t';
  const MARGIN_TOP_MEDIUM = 'mm-t';
  const MARGIN_TOP_SMALL = 'ms-t';
  const MARGIN_TOP_EXTRA_SMALL = 'mxs-t';
  const MARGIN_TOP_NONE = 'mn-t';

  const MARGIN_BOTTOM_EXTRA_LARGE = 'mxl-b';
  const MARGIN_BOTTOM_LARGE = 'ml-b';
  const MARGIN_BOTTOM_MEDIUM = 'mm-b';
  const MARGIN_BOTTOM_SMALL = 'ms-b';
  const MARGIN_BOTTOM_EXTRA_SMALL = 'mxs-b';
  const MARGIN_BOTTOM_NONE = 'mn-b';

  const ALIGN_TOP = 'at';
  const ALIGN_BOTTOM = 'ab';
  const ALIGN_MIDDLE = 'am';

  const DRAWER_TOGGLE = 'drawer__toggle';

  //Hide on mobile
  const DRAWER_HIDE_MOBILE = 'drawer_action--hide-mobile';
  //Shown on mobile only
  const DRAWER_HIDE_NON_MOBILE = 'drawer_action--hide-non-mobile';

  const DRAWER_OPEN = 'drawer--open';
}
