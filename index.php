<?php
$dsn = 'mysql:dbname=heroku_0cb22e7475ce804;host=us-cdbr-east-05.cleardb.net';
$user = 'ba0432b8c211df';
$password = '21995737';

try {
  $pdo = new PDO($dsn, $user, $password);
  echo 'DB接続成功';
  $stmt = $pdo->prepare('SELECT * FROM memos LIMIT 7');
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
  }
} catch (PDOException $e){
  echo ($e->getMessage());
  die();
}
// echo('<pre>');
// var_dump($data);
// echo('<pre>');

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>メモ一覧</title>
</head>
<body>
<table border="1">
<?php foreach($data as $row): ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['memo']; ?></td>
    <td><?php echo $row['created']; ?></td>
  </tr>
<?php endforeach; ?>
</table>

</body>
</html>