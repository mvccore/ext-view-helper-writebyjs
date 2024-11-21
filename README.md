# MvcCore - Extension - View - Helper - Write By JS

[![Latest Stable Version](https://img.shields.io/badge/Stable-v5.3.0-brightgreen.svg?style=plastic)](https://github.com/mvccore/ext-view-helper-writebyjs/releases)
[![License](https://img.shields.io/badge/License-BSD%203-brightgreen.svg?style=plastic)](https://mvccore.github.io/docs/mvccore/5.0.0/LICENSE.md)
![PHP Version](https://img.shields.io/badge/PHP->=5.4-brightgreen.svg?style=plastic)

Prevent sensitive content against spam bots and convert content into JS.

## Installation
```shell
composer require mvccore/ext-view-helper-writebyjs
```

## Example

### Sensitive content to prevent:
```html
<a href="mailto:info@example.com">info@example.com</a>
```

### Rendered output:
```html
<script>
  document.write(String.fromCharCode(
    60,97,32,104,114,101,102,61,34,109,97,105,108,116,111,58,105,110,
    102,111,64,101,120,97,109,112,108,101,46,99,111,109,34,62,105,110,
    102,111,64,101,120,97,109,112,108,101,46,99,111,109,60,47,97,62
  ));
</script>
```