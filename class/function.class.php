<?php

include 'query.class.php';

class functionclass extends Queryclass{

    public function showUser(){
        $datas = $this->getallusers();
        foreach ($datas as $data) {
                echo $data['username']."<br>";
        }
    }

    public function register2(){
        $username1 = $_POST['username']; 
        $password1 = $_POST['password']; 
        $fname1 = $_POST['fname']; 
        $lname1 = $_POST['lname']; 
        $jtitle1 = $_POST['jtitle']; 
        $email1 = $_POST['email']; 
        $mobile1 = $_POST['mobile']; 
        $skype1 = $_POST['skype']; 
        $image1 = $_POST['image']; 
        $insert1->register($image1, $username1, $password1, $fname1, $lname1, $jtitle1, $email1, $mobile1, $skype1);
        if($insert){
            echo "<script>alert('Registration Successful')</script>";  
        }
    }


 


}