# ext-view-helper-writebyjs
Prevent sensitive content against spam bots and convert content into JS:
`<script>
document.write(String.fromCharCode('<a href="mailto:info@example.com">info@example.com</a>'));
</script>`
