import 'domtokenlist-shim';
import EventTargetPolyfill from '@mattkrick/event-target-polyfill/dist';
import 'custom-event-polyfill';
import 'classlist.js';
import closest from 'element-closest';
import raf from 'raf';
import 'mutationobserver-shim';
import 'formdata-polyfill';

raf.polyfill(window);

closest(window);

window.EventTarget = EventTargetPolyfill;
