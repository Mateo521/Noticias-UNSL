import { NAMESPACE } from '../consts';

export default class ImageView {
  constructor(modal) {
    this.modal = modal;

    this.uid = new Date().getTime() + Math.random();
    this.namespace = `${NAMESPACE}-${this.uid}`;

    this.zooming = false;
    this.dragging = false;
    this.transX = 0;
    this.transY = 0;

    this.touchMoveListener = this.touchMove.bind(this);

    this.bind();
  }

  destroy() {
    this.unbind();
    if (this.$img) this.$img.remove();
  }

  bind() {
    this.modal.$container.on(`mousedown.${this.namespace}`, (e) => {
      this.dragging = true;
      this.dragStart(e.pageX, e.pageY);
      e.preventDefault();
    }).on(`touchstart.${this.namespace}`, (e) => {
      this.dragging = true;
      let t = e.originalEvent.changedTouches[0];
      this.dragStart(t.pageX, t.pageY);
    }).on(`mousemove.${this.namespace}`, (e) => {
      if (this.dragging) this.drag(e.pageX, e.pageY);
      e.preventDefault();
    }).on(`mouseup.${this.namespace} mouseleave.${this.namespace}`, (e) => {
      this.dragging = false;
    }).on(`touchend.${this.namespace}`, (e) => {
      this.dragging = false;
    }).on(`dblclick.${this.namespace}`, 'img', (e) => {
      this.toggleZoom(e.offsetX, e.offsetY);
      e.preventDefault();
    });

    this.modal.ownerDocument.addEventListener('touchmove', this.touchMoveListener, { passive: false });

    $(window).on(`resize.${this.namespace}`, (e) => {
      this.init();
    });
  }

  unbind() {
    this.modal.$container.off(`.${this.namespace}`);
    this.modal.ownerDocument.removeEventListener('touchmove', this.touchMoveListener, { passive: false });

    $(window).off(`.${this.namespace}`);
    if (this.$img) this.$img.remove();
  }

  set(source, zooming = null) {
    this.$img = $('<img>').attr('src', source).hide().prependTo(this.modal.$content);
    this.modal.loading();
    this.$img.on('load', () => {
      this.init(zooming);
      this.$img.show();
      this.modal.loaded();
    });
  }

  init(zooming = null) {
    if (zooming != null) this.zooming = zooming;

    let $img = this.$img;
    let $container = this.modal.$container;

    if (this.zooming) {
      $img.css({ 'max-width': '', 'max-height': '' });
    } else {
      $img.css({ 'max-width': '100%', 'max-height': '100%' });
    }

    this.movableX = 0;
    this.movableY = 0;

    if ($img.width() > $container.width()) {
      this.movableX += ($img.width() - $container.width()) / 2;
    }
    if ($img.height() > $container.height()) {
      this.movableY += ($img.height() - $container.height()) / 2;
    }

    if (this.movableX == 0 && this.movableY == 0) {
      $img.css({ 'cursor': 'auto', 'left': '0', 'transform': '' });
    } else {
      $img.css({ 'cursor': 'move' });
    }

    if (this.movableX != 0) {
      $img.css({ 'left': `-${this.movableX}px` });
    }

    this.translate(this.transX, this.transY);
  }

  dragStart(x, y) {
    this.startX = x;
    this.startY = y;
    this.startTransX = this.transX;
    this.startTransY = this.transY;
  }

  drag(x, y) {
    let dx = this.startTransX + (x - this.startX);
    let dy = this.startTransY + (y - this.startY);
    this.translate(dx, dy);
  }

  touchMove(e) {
    if (this.dragging) this.drag(e.changedTouches[0].pageX, e.changedTouches[0].pageY);
    e.preventDefault();
  }

  translate(dx, dy) {
    if (dx < -this.movableX) dx = -this.movableX;
    if (dx > this.movableX) dx = this.movableX;
    if (dy < -this.movableY) dy = -this.movableY;
    if (dy > this.movableY) dy = this.movableY;

    this.transX = dx;
    this.transY = dy;
    this.$img.css('transform', `translate(${dx}px, ${dy}px)`);
  }

  wheel(dx, dy) {
    this.translate(this.transX + dx, this.transY - dy);
  }

  toggleZoom(offsetX, offsetY) {
    let dx = (this.$img.width() / 2 - offsetX) * (this.$img.get(0).naturalWidth / this.$img.width());
    let dy = (this.$img.height() / 2 - offsetY) * (this.$img.get(0).naturalHeight / this.$img.height());
    this.modal.toggleZoom();
    this.translate(dx, dy);
  }
}
