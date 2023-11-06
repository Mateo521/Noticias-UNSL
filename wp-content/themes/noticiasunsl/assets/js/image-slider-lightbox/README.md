# jquery-simple-lightbox

A jquery plugin for simple lightbox.

## Dependencies

* jquery

## Installation

Install from npm:

    $ npm install @kanety/jquery-simple-lightbox --save

## Usage

Build file input field:

```html
<div id="gal">
  <a href="img1.png" rel="lightbox" title="img1.png"><img src="img1_thumb.png"></a>
  <a href="img2.png" rel="lightbox" title="img2.png"><img src="img2_thumb.png"></a>
  <a href="img3.png" rel="lightbox" title="img3.png"><img src="img3_thumb.png"></a>
</div>
```

Then run:

```javascript
$('#gal').simpleLightbox();
```

### Options

Change link selector:

```javascript
$('#gal').simpleLightbox({
  links: 'a[rel="lightbox"]'
});
```

Change lightbox owner:

```javascript
$('#gal').simpleLightbox({
  owner: 'body'
});
```

Change image extensions:

```javascript
$('#gal').simpleLightbox({
  imageExt: /^(jpg|jpeg|png|gif|bmp|webp)$/
});
```

## License

The library is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
