<?php include_once "db.php";

$user=$User->find(['email'=>$_GET['email']]);


if(!empty($user)){
    echo "您的密碼是:".$user['pw'];
}else{
    echo "查無帳號";
}



?>