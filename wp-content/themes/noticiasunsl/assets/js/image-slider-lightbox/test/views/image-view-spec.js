import { NAMESPACE, drag, wheel, wheelSupported } from '../helper'

describe('jquery-simple-lightbox', () => {
  beforeEach(() => {
    document.body.innerHTML = __html__['index.html'];
    eval($('script').text());
  });

  describe('image-view', () => {
    let $links, $container;
    let lightbox, view;

    beforeEach((done) => {
      $links = $('#basic').find('a');
      $links.eq(0).click();

      lightbox = $('#basic').data(NAMESPACE);
      view = lightbox.modal.view;

      $container = lightbox.modal.$container;
      $container.find('img').on('load', () => {
        done();
      });
    });

    it('moves', () => {
      $container.find(`.${NAMESPACE}-next`).click().click();
      expect($links.eq(2).hasClass(`${NAMESPACE}-current`)).toEqual(true);
    });

    it('moves while zooming', () => {
      $container.find(`.${NAMESPACE}-zoom`).click();
      $container.find(`.${NAMESPACE}-next`).click().click();
      expect($links.eq(2).hasClass(`${NAMESPACE}-current`)).toEqual(true);
    });

    describe('window resize', () => {
      it('initializes image by resize', () => {
        view.transX = 10;
        $(window).trigger('resize');
        expect(view.transX).toEqual(0);
      });
    });

    describe('drag', () => {
      beforeEach(() => {
        $container.find(`.${NAMESPACE}-zoom`).click();
      });

      it('handles event', () => {
        spyOn(view, 'drag');
        drag($container.find('img'), 1, 1);
        expect(view.drag).toHaveBeenCalled();
      });

      it('transforms image', () => {
        view.dragStart(0, 0);
        view.drag(1, 1);
        expect(view.transX).toEqual(1);
      });
    });

    if (wheelSupported()) {
      describe('wheel', () => {
        beforeEach(() => {
          $container.find(`.${NAMESPACE}-zoom`).click();
        });

        it('handles event', () => {
          spyOn(view, 'wheel');
          wheel(1, 1);
          expect(view.wheel).toHaveBeenCalled();
        });

        it('transforms image', () => {
          view.wheel(1, 1);
          expect(view.transX).toEqual(1);
        });
      });
    }
  });
});
