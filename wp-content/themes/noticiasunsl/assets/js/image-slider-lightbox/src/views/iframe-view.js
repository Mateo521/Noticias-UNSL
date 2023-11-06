import { NAMESPACE } from '../consts';

export default class IframeView {
  constructor(modal) {
    this.modal = modal;

    this.uid = new Date().getTime() + Math.random();
    this.namespace = `${NAMESPACE}-${this.uid}`;

    this.zooming = false;

    this.bind();
  }

  destroy() {
    this.unbind();
    if (this.$inner) this.$inner.remove();
  }

  bind() {
    $(window).on(`resize.${this.namespace}`, (e) => {
      this.init();
    });
  }

  unbind() {
    this.modal.$container.off(`.${this.namespace}`);
    $(window).off(`.${this.namespace}`);
  }

  set(source, zooming) {
    this.$inner = $('<div>').prependTo(this.modal.$content);
    this.$iframe = $('<iframe>').attr('src', source).css('visibility', 'hidden').prependTo(this.$inner);

    this.modal.loading();
    this.$iframe.on('load', () => {
      this.init(zooming);
      this.$iframe.css({ 'visibility': 'visible', 'background-color': '#fff' });
      this.modal.loaded();
    });
  }

  init(zooming = null) {
    if (zooming != null) this.zooming = zooming;

    if (this.zooming || !IframeView.readableDocument(this.$iframe)) {
      this.defaultSize();
    } else {
      this.stretch();
    }
  }

  defaultSize() {
    this.$inner.css({ 'width': 'auto', 'height': 'auto' });
    this.$iframe.css({ 'transform': '', 'transform-origin': '', 'width': '100%', 'height': '100%' });
    this.$iframe.attr('scrolling', 'auto')
  }

  stretch() {
    let $content = this.modal.$content;
    let $iframe = this.$iframe;

    let doc = $iframe.get(0).contentWindow.document;
    let width = doc.body.scrollWidth;
    let height = doc.body.scrollHeight;

    let scaleX = $content.width() / width;
    let scaleY = $content.height() / height;

    if (scaleX < 1 && scaleX < scaleY) {
      this.$inner.css({ 'width': '100%', 'height': `${height * scaleX}px` });
      this.transform(width, height, scaleX);
    } else if (scaleY < 1 && scaleY < scaleX) {
      this.$inner.css({ 'width': `${width * scaleY}px`, 'height': '100%' });
      this.transform(width, height, scaleY);
    } else {
      this.$inner.css({ 'width': `${width}px`, 'height': `${height}px` });
      this.transform(width, height);
    }
    this.$iframe.attr('scrolling', 'no');
  }

  transform(width, height, scale = null) {
    this.$iframe.css({
      'transform': scale ? `scale(${scale})` : '',
      'transform-origin': scale ? 'top left' : '',
      'width': `${width}px`,
      'height': `${height}px`
    });
  }

  wheel(dx, dy) {
    // noop
  }

  static readableDocument($iframe) {
    try {
      $iframe.get(0).contentWindow.document;
    } catch {
      return false;
    }
    return true;
  }
}
