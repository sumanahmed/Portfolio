<?php
namespace App\classes;
use App\classes\Database;

class About{

    public function saveMyImage(){
        $link = Database::db_connection();
        $directory = "uploads/about-img/";
        $imageUrl = $directory.$_FILES['about_image']['name'];

        $check = getimagesize($_FILES['about_image']['tmp_name']);
        if($check){
            if (file_exists($imageUrl)){
                $msg = "<span class='error'><strong>Error ! </strong>File already Exists. Please ty another one</span>";
                return $msg;
            }else{
                if($_FILES['about_image']['size'] > 8000000){
                    $msg = "<span class='error'><strong>Error ! </strong>File size is too large. Maximum file size is 5MB</span>";
                    return $msg;
                }else{
                    $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    if ($fileType == 'jpg' || $fileType == 'png') {
                        move_uploaded_file($_FILES['about_image']['tmp_name'], $imageUrl);
                        return $imageUrl;
                    } else{
                        $msg = "<span class='error'><strong>Error ! </strong>File type must be jpg or png</span>";
                        return $msg;
                    }
                }
            }
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>Please use an image file to upload.</span>";
            return $msg;
        }
    }

    public function updatePersonalInformation($data){
        extract($data);
        $link = Database::db_connection();
        $image = $_FILES['about_image']['name'];
        if($image){
            $imageUrl = About::saveMyImage();

            $sql = "SELECT * FROM about WHERE id=1";
            $result = mysqli_query($link, $sql);
            $value = mysqli_fetch_assoc($result);
            unlink($value['about_image']);

            $sql = "UPDATE about SET name='$name', email='$email', present_address='$present_address', permanent_address='$permanent_address', phone='$phone', nationality='$nationality', about_image='$imageUrl', my_biodata='$my_biodata' WHERE id=1 ";
            $update = mysqli_query($link, $sql);
            if($update){
                $msg = "<span class='success'><strong>Success ! </strong>About Content Updated Successfully.</span>";
                return $msg;
            }else{
                die("Query Problem".mysqli_error($link));
            }
        }else{
            $link = Database::db_connection();
            $sql = "UPDATE about SET name='$name', email='$email', present_address='$present_address', permanent_address='$permanent_address', phone='$phone', nationality='$nationality', my_biodata='$my_biodata' WHERE id=1 ";
            $update = mysqli_query($link, $sql);
            if($update){
                $msg = "<span class='success'><strong>Success ! </strong>About Content Updated Successfully.</span>";
                return $msg;
            }else{
                die("Query Problem".mysqli_error($link));
            }
        }
    }

    public function getPersonalInformation(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM about";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        return $value;
    }
}