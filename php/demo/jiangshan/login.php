<?php
require_once('db.php');
$post = $_POST;
$name = $post['name'];
$password = $post['password'];

$sql  = "select * from user where name = '{$name}'";


$select = $dbh->query($sql);

$user = [];
foreach ($select as $row) {
    $user = $row;
}
if (empty($user)) {
    echo '用户名不存在';
    return false;
}

// var_dump(  $user);
// die;
if(md5($password) == $user['password']){
  echo '登录成功';
  $_SESSION['name'] = $name;
  $_SESSION['status'] = $user['status'];
  header('Location:index.php');
}else{
  echo '密码错误';
}