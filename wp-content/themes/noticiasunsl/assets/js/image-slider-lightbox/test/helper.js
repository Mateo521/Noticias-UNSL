export const NAMESPACE = 'simple-lightbox';

export function keydown(elem, code, ctrl = false, shift = false) {
  $(elem).trigger($.Event('keydown', { keyCode: code, ctrlKey: ctrl, shiftKey: shift }));
}

export function drag(elem, moveX = 10, moveY = 10) {
  $(elem).trigger($.Event('mousedown', { pageX: 0, pageY: 0 }));
  $(elem).trigger($.Event('mousemove', { pageX: moveX, pageY: moveY }));
  $(elem).trigger($.Event('mouseup'));
}

export function wheel(moveX = 10, moveY = 10) {
  let event = new WheelEvent('wheel', { deltaX: moveX, deltaY: moveY });
  document.dispatchEvent(event);
}

export function wheelSupported() {
  var ua = window.navigator.userAgent.toLowerCase();
  return ua.indexOf('msie') == -1 && ua.indexOf('trident') == -1;
}
