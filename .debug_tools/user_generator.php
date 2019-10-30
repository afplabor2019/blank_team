<?php
require_once('lib/config.php');

//id, user_name, email, fullname, birth_date, age, role, registration_date, shipping_id, password, del

$sql = new SQL();
$n = 0;
if(!empty($_GET['n'])){
    $n =  (int)$_GET['n'];
}else{
    $n = 100;
}
for ($i = 0; $i<$n; $i++){
    $id = ID::GenerateID();
    $user_name = "test_user_$id";
    $email = "test$id@example.com";
    $fullname = "Test User $id";
    $birth_date  = "2000-01-01";
    $age = '19';
    $psw = password_hash($id, PASSWORD_DEFAULT);
    try{
        $sql->execute(
            "INSERT INTO `users` (
          `id`, 
          `user_name`, 
          `email`, 
          `fullname`, 
          `birth_date`, 
          `age`, 
          `role`, 
          `registration_date`, 
          `shipping_id`, 
          `password`, 
          `del`) 
      VALUES (
          ?, 
          ?, 
          ?, 
          ?, 
          ?, 
          ?, 
          0, 
          CURRENT_TIMESTAMP, 
          0, 
          ?, 
          0)",
            $id,
            $user_name,
            $email,
            $fullname,
            $birth_date,
            $age,
            $psw);
    }catch (Exception $e){
        Debug::Dump($e);
        die();
    }
}
print("$n user generated");