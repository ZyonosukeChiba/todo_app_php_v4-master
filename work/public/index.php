<?php

$comment_array=array();
$pdo=null;




//データベース接続
try {
  $pdo = new PDO('mysql:charset=UTF8;dbname=myapp;host=db', 'myappuser', 'myapppass');
} catch (PDOException $e) {
  //接続エラーのときエラー内容を取得する
  $error_message[] = $e->getMessage();
}

if(!empty($_POST["submitButton"])){

  $postDate=date("Y-m-d H:i:s");

  try{

  $stmt = $pdo->prepare("INSERT INTO bbs (username,comment,postDate) VALUES (:username,:comment,:postDate)");
  $stmt->bindParam(':username', $_POST["username"],PDO::PARAM_STR);
  $stmt->bindParam(':comment',$_POST["comment"] ,PDO::PARAM_STR);
  $stmt->bindParam(':postDate',$postdate ,PDO::PARAM_STR);

  $stmt->execute();
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}







//DBから取得
$sql="SELECT * FROM bbs";
$comment_array=$pdo->query($sql);

//DB閉じる
$pdo =null;
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
    <section>
    <?php foreach($comment_array as $comment): ?>
    <article>
      <div class="wrapper">
        <div class="nameArea">
          <span>名前:</span>
          <p class="username"><?php echo $comment["username"]; ?></p>
          <time><?php echo $comment["postDate"]; ?></time>
        </div>
        <p class="comment"><?php echo $comment["comment"]; ?></p>
      </div>
    </article>
    <?php endforeach; ?>
  <form method="POST" class="formWrapper">
  </section>
  
    <div>
        <input type="submit" value="書き込む" name="submitButton">
        <label for="usernameLabel">名前:</label>
        <input type="text" name="username"> 

    </div>
    <div>
      <textarea name="comment" class="commentTextArea"></textarea>

    </div>

  </form>


</body>


</html>