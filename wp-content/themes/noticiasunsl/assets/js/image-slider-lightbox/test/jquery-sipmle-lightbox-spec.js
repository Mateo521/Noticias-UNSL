import { NAMESPACE, keydown, wheel, wheelSupported } from './helper'

describe('jquery-simple-lightbox', () => {
  beforeEach(() => {
    document.body.innerHTML = __html__['index.html'];
    eval($('script').text());
  });

  describe('basic', () => {
    let $links, $container;
    let lightbox, modal;

    beforeEach(() => {
      $links = $('#basic').find('a');
      $links.eq(0).click();

      lightbox = $('#basic').data(NAMESPACE);
      modal = lightbox.modal;
      $container = modal.$container;
    });

    describe('open modal', () => {
      it('opens modal', () => {
        expect($container.length).toEqual(1);
        expect($links.eq(0).hasClass(`${NAMESPACE}-current`)).toEqual(true);
      });
    });

    describe('close modal', () => {
      it('closes modal by click', () => {
        $container.find(`.${NAMESPACE}-close`).click();
        expect($('body').find(`.${NAMESPACE}-modal`).length).toEqual(0);
      });

      it('closes modal by keydown', () => {
        keydown(document, 27);
        expect($('body').find(`.${NAMESPACE}-modal`).length).toEqual(0);
      });

      it('closes modal by clicking wrapper area', () => {
        $container.find(`.${NAMESPACE}-wrapper`).click();
        expect($('body').find(`.${NAMESPACE}-modal`).length).toEqual(0);
      });

      it('does not close by clicking content area', () => {
        $container.find(`.${NAMESPACE}-content`).click();
        expect($('body').find(`.${NAMESPACE}-modal`).length).toEqual(1);
      });
    });

    describe('new window', () => {
      it('opens new window', () => {
        spyOn(window, 'open');
        $container.find(`.${NAMESPACE}-window`).click();
        expect(window.open).toHaveBeenCalled();
      });
    });

    describe('zoom', () => {
      it('zooms by click', () => {
        $container.find(`.${NAMESPACE}-zoom`).click();
        expect($container.hasClass(`${NAMESPACE}-zooming`)).toEqual(true);
        $container.find(`.${NAMESPACE}-zoom`).click();
        expect($container.hasClass(`${NAMESPACE}-zooming`)).toEqual(false);
      });

      it('zooms by double click', () => {
        $container.find('img').dblclick();
        expect($container.hasClass(`${NAMESPACE}-zooming`)).toEqual(true);
        $container.find('img').dblclick();
        expect($container.hasClass(`${NAMESPACE}-zooming`)).toEqual(false);
      });

      it('zooms by keydown', () => {
        keydown(document, 13);
        expect($container.hasClass(`${NAMESPACE}-zooming`)).toEqual(true);
        keydown(document, 13);
        expect($container.hasClass(`${NAMESPACE}-zooming`)).toEqual(false);
      });
    });

    describe('navi', () => {
      it('moves by click', () => {
        $container.find(`.${NAMESPACE}-next`).click().click().click();
        expect($links.eq(2).hasClass(`${NAMESPACE}-current`)).toEqual(true);

        $container.find(`.${NAMESPACE}-prev`).click().click().click();
        expect($links.eq(0).hasClass(`${NAMESPACE}-current`)).toEqual(true);
      });

      it('moves by keydown', () => {
        keydown(document, 39);
        expect($links.eq(1).hasClass(`${NAMESPACE}-current`)).toEqual(true);

        keydown(document, 37);
        expect($links.eq(0).hasClass(`${NAMESPACE}-current`)).toEqual(true);

        keydown(document, 34);
        expect($links.eq(1).hasClass(`${NAMESPACE}-current`)).toEqual(true);

        keydown(document, 33);
        expect($links.eq(0).hasClass(`${NAMESPACE}-current`)).toEqual(true);

        keydown(document, 32);
        expect($links.eq(1).hasClass(`${NAMESPACE}-current`)).toEqual(true);

        keydown(document, 8);
        expect($links.eq(0).hasClass(`${NAMESPACE}-current`)).toEqual(true);
      });

      if (wheelSupported()) {
        it('moves by wheel', () => {
          wheel(0, 1);
          expect($links.eq(1).hasClass(`${NAMESPACE}-current`)).toEqual(true);

          wheel(0, -1);
          expect($links.eq(0).hasClass(`${NAMESPACE}-current`)).toEqual(true);
        });
      }
    });
  });

  describe('destroy', () => {
    let $basic;

    beforeEach(() => {
      eval($('script').text());
      $basic = $('#basic');
      $basic.find('a').first().click();
      $basic.data(NAMESPACE).destroy();
    });

    it('destroys existing object', () => {
      expect($._data($basic.get(0), 'events')).toEqual(undefined);
    });
  });
});
