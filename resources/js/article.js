const quill = new Quill('#editor', {
    theme: 'snow'
});

const quillTextarea = document.querySelector('#bibliography');
const quillContentBlock = document.querySelector('#editor .ql-editor');

quill.on('text-change', function(delta, oldDelta, source) {
    const editorContent = quillContentBlock.innerHTML;
    quillTextarea.value = editorContent;
  });
