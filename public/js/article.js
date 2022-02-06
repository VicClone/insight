/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/article.js ***!
  \*********************************/
var quill = new Quill('#editor', {
  theme: 'snow'
});
var quillTextarea = document.querySelector('#bibliography');
var quillContentBlock = document.querySelector('#editor .ql-editor');
quill.on('text-change', function (delta, oldDelta, source) {
  var editorContent = quillContentBlock.innerHTML;
  quillTextarea.value = editorContent;
});
/******/ })()
;