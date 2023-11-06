import $ from 'jquery';

import { NAMESPACE } from './consts';
import SimpleLightbox from './simple-lightbox';

$.fn.simpleLightbox = function(options) {
  return this.each((i, elem) => {
    let $elem = $(elem);
    if ($elem.data(NAMESPACE)) $elem.data(NAMESPACE).destroy();
    $elem.data(NAMESPACE, new SimpleLightbox($elem, options));
  });
};

$.SimpleLightbox = SimpleLightbox;
