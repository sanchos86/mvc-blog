import 'bootstrap';
import Quill from 'quill';
import hljs from 'highlight.js';
// TODO reduce bootstrap modules and quill modules

const options = {
  placeholder: 'Введите текст...',
  modules: {
    syntax: {
      highlight: (text) => hljs.highlightAuto(text).value,
    },
    toolbar: [
      ['bold', 'italic', 'underline', 'strike'],
      ['code-block', 'blockquote', 'code'],
      [{ list: 'ordered' }, { list: 'bullet' }],
      [{ indent: '-1' }, { indent: '+1' }],
      [{ header: [1, 2, 3, 4, 5, 6, false] }],
      [{ align: [false, 'center', 'right', 'justify'] }],
      [{ color: [] }, { background: [] }],
      ['link', 'image'],
    ],
  },
  theme: 'snow'
}

const createPostQuillEditor = document.querySelector('#create-post-quill-editor');
const editPostQuillEditor = document.querySelector('#edit-post-quill-editor');

if (createPostQuillEditor) {
  const createPostQuillEditorInstance = new Quill(createPostQuillEditor, options);

  const form = document.querySelector('[name="create-post-form"]');
  const textControl = document.querySelector('[name="text"]');
  const plainTextControl = document.querySelector('[name="plain_text"]');

  form.addEventListener('submit', () => {
    let createPostQuillEditorInnerHtml = createPostQuillEditor.children[0].innerHTML;
    if (createPostQuillEditorInnerHtml === '<p><br></p>') {
      createPostQuillEditorInnerHtml = '';
    }
    textControl.value = createPostQuillEditorInnerHtml;
    plainTextControl.value = createPostQuillEditorInstance.getText();
  });
}

if (editPostQuillEditor) {
  const editPostQuillEditorInstance = new Quill(editPostQuillEditor, options);

  const form = document.querySelector('[name="edit-post-form"]');
  const textControl = document.querySelector('[name="text"]');
  const plainTextControl = document.querySelector('[name="plain_text"]');
  const oldCreatePostQuillEditorInnerHtml = editPostQuillEditor.parentNode.querySelector('textarea').value;

  editPostQuillEditorInstance.pasteHTML(oldCreatePostQuillEditorInnerHtml);

  form.addEventListener('submit', () => {
    let editPostQuillEditorInnerHtml = editPostQuillEditor.children[0].innerHTML;
    if (editPostQuillEditorInnerHtml === '<p><br></p>') {
      editPostQuillEditorInnerHtml = '';
    }
    textControl.value = editPostQuillEditorInnerHtml;
    plainTextControl.value = editPostQuillEditorInstance.getText();
  });
}
