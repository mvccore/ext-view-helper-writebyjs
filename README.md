# ext-view-helper-writebyjs
Prevent sensitive content against spam bots and convert content into JS.

## Sensitive content to prevent:
```html
<a href="mailto:info@example.com">info@example.com</a>
```

## Rendered output:
```html
<script>document.write(String.fromCharCode(60,97,32,104,114,101,102,61,34,109,97,105,108,116,111,58,105,110,102,111,64,101,120,97,109,112,108,101,46,99,111,109,34,62,105,110,102,111,64,101,120,97,109,112,108,101,46,99,111,109,60,47,97,62));</script>
```
