<!DOCTYPE html>
<html labg="en">
<head>
<meta chrset="utf-8" />
<title>Modal App　Challenge</title>
<link rel="stylesheet" href="styles.css" />
<style>
    body {
  font-family: serif;
  font-size: 16px;
  line-height: 1.6;
  color: #fff;
}

.button {
  background: lightblue;
  color: #fff;
  padding: 0 2em;
  border: 0;
  width: 500px;
  height: 100px;
  font-size: 45px;
  border-radius: 5px;
  font-weight: 900;
  position: relative;
  left: 400px;
  top: 260px;
  font-family: serif;
}

.button:hover {
  background: lightcoral;
  cursor: pointer;
}

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.5);
}

.modal-content {
  background-color: #f4f4f4;
  margin: 20% auto;
  width: 50%;
  box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2),0 7px 20px 0 rgba(0,0,0,0.17);
  animation-name: modalopen;
  animation-duration: 1s;
}

@keyframes modalopen {
  from {opacity: 0}
  to {opacity: 1}
}

.modal-header h1 {
  margin: 1rem 0;
}

.modal-header {
  background: lightblue;
  padding: 3px 15px;
  display: flex;
  justify-content: space-between;
}

.modalClose {
  font-size: 2rem;
}

.modalClose:hover {
  cursor: pointer;
}

.modal-body {
  padding: 10px 20px;
  color: black;
}
</style>
</head>
<body>
  <button id="modalOpen" class="button">Click Me</button>

      <div id="easyModal" class="modal">
          <div class="modal-content">
            <div class="modal-header">
              {!! Form::open(['url' => '/update/top','method' => 'POST']) !!}
              {{ Form::label('post') }}
              {{ Form::submit('更新') }}
              {!! Form::close() !!}
              <span class="modalClose">×</span>
            </div>
        </div>
  <script src="main.js"></script>
    <script>
        const buttonOpen = document.getElementById('modalOpen');
        const modal = document.getElementById('easyModal');
        const buttonClose = document.getElementsByClassName('modalClose')[0];

        // ボタンがクリックされた時
        buttonOpen.addEventListener('click', modalOpen);
        function modalOpen() {
        modal.style.display = 'block';
        }

        // バツ印がクリックされた時
        buttonClose.addEventListener('click', modalClose);
        function modalClose() {
        modal.style.display = 'none';
        }

        // モーダルコンテンツ以外がクリックされた時
        addEventListener('click', outsideClose);
        function outsideClose(e) {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
        }
    </script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
