<?
session_start();

$PDO = new PDO('mysql:host=localhost;dbname=gosuslugi', "root", "root");
$login = $_POST['email'];
$password = $_POST['password'];
$check_users = $PDO->query("SELECT * FROM `users` WHERE `LOGIN` = '$login' AND `PASSWORD` = '$password'")->fetchAll(PDO::FETCH_ASSOC);
if (count($check_users) < 1) {
  $_SESSION['message'] = 'Неверный логин или пароль!';
  header("Location: /index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="flex fixed">
  </div>

  <div class="flex fixed-request">
    <h3>Будут удалены все просроченные заявки!</h3></br>
    <h3>Продолжить?</h3></br>
    <button class="del-zayavki-true">Да</button>
    <button class="del-zayavki-false">Нет</button>
  </div>

  <div class="flex">

      <button class="cabinet-button get-childs">
        <span class="submit">Родители</span>
        <span class="error">Загрузка...</span>
      </button>
      <button class="cabinet-button get-zayavki">
        <span class="submit">Заявки</span>
        <span class="error">Загрузка...</span>
      </button>
      <h3 class="descr">Удалить просроченные заявки</h3>
      <button class="cabinet-button del-zayavki">
        <span class="submit">Удалить</span>
        <span class="error">Подтвердите...</span>
      </button>
      <h3 class="descr">Создать заявку</h3>
      <!-- Специально ставлю maxlength="201", чтобы можно была затриггерить проверки на сервере -->
      <textarea maxlength="201" placeholder="Текст заявки"></textarea>
      <select>
        <option>От текущей даты</option>
        <option>Заведомо просроченная</option>
      </select>
      <button class="cabinet-button create-zayavka">
        <span class="submit">Создать</span>
        <span class="error">Загрузка...</span>
      </button>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="/script.js"></script>
  <link rel="stylesheet" href="/style.css">
</body>
</html>