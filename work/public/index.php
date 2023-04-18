<?php



if(!empty($_POST["submitButton"])){
  echo $_POST["username"];
  echo $_POST["comment"];
}



//データベース接続
try {
  $pdo = new PDO('mysql:charset=UTF8;dbname=myapp;host=db', 'myappuser', 'myapppass');
} catch (PDOException $e) {
  //接続エラーのときエラー内容を取得する
  $error_message[] = $e->getMessage();
}



?>





<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title>My Todos</title>

</head>
<body>
<h1 class="boardWrapper">PHPで掲示板アプリ</h1>
<hr>
  <form class="formWrapper">
    <section>
    <article>
      <div class="wrapper">
        <div class="nameArea">
          <span>名前:</span>
          <p class="usernaem">shincode</p>
          <time>2023-4-17</time>
        </div>
      </div>
    </article>


  </section>
    <div>
        <input type="submit" value="書き込む">
        <label for="">名前:</label>
        <input type="text" name="username"> 

    </div>
    <div>
      <textarea class="commentTextArea"></textarea>

    </div>

  </form>


</body>


</html>