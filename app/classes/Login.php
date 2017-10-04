<?php
namespace App\classes;
use App\classes\Database;

class Login{


    public function adminLogin($data){
        $link = Database::db_connection();
        $email = mysqli_real_escape_string($link, $data['email']);
        $password = mysqli_real_escape_string($link, md5($data['password']));
        if($email == "" || $password == ""){
            $msg = "<span class='error'><strong>Error ! </strong>Fields Must Not Be Empty.</span>";
            return $msg;
        }else{
            $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
            $result = mysqli_query($link, $sql);
            if($result){
                $value = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION['id'] = $value['id'];
                $_SESSION['name'] = $value['name'];
                header("Location:dashboard.php");
            }else{
                $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
                return $msg;
            }
        }
    }

    public function adminLogOut(){
        session_destroy();
        header("Location:index.php");
    }

    public function updateSocailButonLink($data){
        extract($data);
        $link = Database::db_connection();
        $sql = "UPDATE socials SET fb_link='$fb_link', tw_link='$tw_link', ln_link='$ln_link', gp_link='$gp_link' WHERE id=1";
        $update = mysqli_query($link, $sql);
        if($update){
            $msg = "<span class='success'><strong>Success ! </strong>Social Button updated Successfully</span>";
            return $msg;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($link)."</span>";
            return $msg;
        }
    }

    public function socialButtonLink(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM socials";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        return $value;
    }


    public function changeCopyright($copyright_text){
        $link = Database::db_connection();
        $sql = "UPDATE copyright SET copyright_text='$copyright_text' WHERE id=1";
        $update = mysqli_query($link, $sql);
        if($update){
            $msg = "<span class='success'><strong>Success ! </strong>Copyright Text updated Successfully</span>";
            return $msg;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($link)."</span>";
            return $msg;
        }

    }

    public function getCopyrightText(){
        $link = Database::db_connection();
        $sql = "SELECT copyright_text FROM copyright";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        return $value;
    }


}