import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';


  const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '500px',
    initialEditType: 'markdown',
    initialValue: document.querySelector('#hidden_content').value,
  })

  document.querySelector('#createPostForm').addEventListener('submit', e => {
      e.preventDefault();
      document.querySelector('#hidden_content').value = editor.getMarkdown();
      e.target.submit();
  });


