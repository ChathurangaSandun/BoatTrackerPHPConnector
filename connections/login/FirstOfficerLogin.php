<?php
/**
 * Created by PhpStorm.
 * User: Chathuranga Sandun
 * Date: 6/10/2016
 * Time: 3:10 AM
 */


include_once '../../db/Database.php';

//connection
$db = new database();
$con = $db->getInstance();

$username = $_POST['username'];
$password = $_POST['password'];


if(!empty($username)&& !empty($password)){

  $query = "select * from user where user_name= :username and password = :password";

  $stmt = $con->prepare($query);
  $stmt->bindParam(":username",$username);
  $stmt->bindParam(":password",$password);
  $stmt->execute();

  if($stmt->rowCount()== 1 ){
    $userType = $stmt->fetchColumn(3);

    if($userType != "Owner"){
      echo 1;
    }else{
      echo 0;
    }
  }else{
    echo 0;
  }

}else{
  echo -1;
}






