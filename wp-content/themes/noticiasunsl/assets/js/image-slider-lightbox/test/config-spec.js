describe('jquery-simple-lightbox', () => {
  it('config', () => {
    let defaults = $.SimpleLightbox.getDefaults();
    expect(defaults.test).toEqual(undefined);

    defaults = $.SimpleLightbox.setDefaults({test: 'test'});
    expect(defaults.test).toEqual('test');
  });
});
