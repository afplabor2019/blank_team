<?php 
class User
{
    var $id;
    var $user_name;
    var $email;
    var $fullname;
    var $birth_date;
    var $shippingID;
    var $age;
    var $registration_date;
    var $role;
    var $del;

    function get_id(){
        return $id;
    }

    function set_id($new){
        $id = $new;
    }

    function set_user_name($new){
        $user_name = $new;
    }

    function get_user_name(){
        return $user_name;
    }

    function set_email($newEmail){
        $email = $newEmail;
    }

    function get_email(){
        return $email;
    }

    function set_full_name($new){
        $fullname = $new;
    }

    function get_full_name(){
        return $fullname;
    }

    function set_birth_date($new){
        $birth_date = $new;
    }

    function get_birth_date(){
        return $birth_date;
    }

    function set_shippingID($new){
        $shippingID = $new;
    }

    function get_shippingID(){
        return $shippingID;
    }

    function get_age(){
        return $age;
    }

    function set_age($new){
        $age = $new;
    }

    function get_registration_date(){
        return $registration_date;
    }

    function set_registration_date($new){
        $registration_date = $new;
    }

    function get_role(){
        return $role;
    }

    function set_role($new){
        $role = $new;
    }

    function get_del(){
        return $del;
    }

    function set_del($new){
        $del = $new;
    }

    function __construct($pid,$puser_name,$pemail,$pfullname,$pbirth_date,$page,$prole,$pregistration_date,$pshippingID,$pdel){
        $id = $pid;
        $user_name = $puser_name;
        $email = $pemail;
        $fullname =$pfullname;
        $birth_date = $pbirth_date;
        $age = $page;
        $role = $prole;
        $registration_date = $pregistration_date;
        $shippingID = $pshippingID;
        $del = $pdel;
    }

}

?>