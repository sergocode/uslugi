<?
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="notification">
    <div>
      <p>Некоректный ввод данных!</p>
      <a href="#">
        <span></span>
      </a>
    </div>
  </div>

  <div class="flex">
    <form id="form" action="/cabinet/index.php" method="post">
      <input id="email" type="email" name="email" placeholder="Эл. почта" />
      <input id="password" type="password" name="password" placeholder="Пароль" />
      <div class="shake button-sub send">
        <span class="button">ВОЙТИ</span>
        <span class="error">ОШИБКА!</span>
      </div>
    </form>
    <?if(isset($_SESSION['message'])):?>
    <span class="session-message"><?=$_SESSION['message']?></span>
    <?unset($_SESSION['message']);?>
    <?endif;?>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="/script.js"></script>
  <link rel="stylesheet" href="/style.css">
</body>
</html>