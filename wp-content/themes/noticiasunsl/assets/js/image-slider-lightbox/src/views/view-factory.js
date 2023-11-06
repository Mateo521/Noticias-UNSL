import ImageView from './image-view';
import IframeView from './iframe-view';

export default class ViewFactory {
  constructor(modal) {
    this.modal = modal;
    this.options = modal.options
  }

  create($link) {
    let url = $link.attr('href');
    let type = $link.data('type') || this.typeFromURL(url);
    let view = null;

    switch(type) {
    case 'img':
      view = new ImageView(this.modal);
      break;
    default:
      view = new IframeView(this.modal);
      break;
    }

    return view;
  }

  typeFromURL(url) {
    let ext = this.getExtname(url);
    if (ext.match(this.options.imageExt)) {
      return 'img';
    } else {
      return 'iframe';
    }
  }

  getExtname(url) {
    let filename = url.replace(/[?#].*$/, '').split('/').pop();
    return filename.split('.').pop();
  }
}
