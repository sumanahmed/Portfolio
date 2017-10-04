<?php
namespace App\classes;
use App\classes\Database;

class Blog{

   public function blogPostImage(){
       $link = Database::db_connection();
       $directory = "uploads/blog-img/";
       $imageUrl = $directory.$_FILES['post_image']['name'];

       $check = getimagesize($_FILES['post_image']['tmp_name']);
       if($check){
            if(file_exists($imageUrl)){
                $msg = "<span class='error'><strong>Error ! </strong>Image Already Exists ! Please choose another image.</span>";
                return $msg;
            }else{
                if($_FILES['post_image']['size'] > 5124000){
                    $msg = "<span class='error'><strong>Error ! </strong>File size is too large. Maximum file size is 5MB.</span>";
                    return $msg;
                }else{
                    $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    if($fileType == 'jpg' || $fileType == 'png'){
                        move_uploaded_file($_FILES['post_image']['tmp_name'], $imageUrl);
                        return $imageUrl;
                    }else{
                        $msg = "<span class='error'><strong>Error ! </strong>Image type must be jpg or png</span>";
                        return $msg;
                    }
                }
            }
       }else{
           $msg = "<span class='error'><strong>Error ! </strong>Please Use an image.</span>";
           return $msg;
       }
   }

   public function saveBlogPost($data){
       $link = Database::db_connection();
       $image = Blog::blogPostImage();
       extract($data);
       $author_name = $_SESSION['name'];
       if($post_title == "" || $post_description == ""){
           $msg = "<span class='error'><strong>Error ! </strong>Field Must not be Empty.</span>";
           return $msg;
       }else{
            $sql = "INSERT INTO blogs (post_title, post_image, post_description, author_name, publication_status) VALUES('$post_title','$image','$post_description','$author_name','$publication_status')";
           $insert = mysqli_query($link, $sql);
           if($insert) {
               $msg = "<span class='success'><strong>Success ! </strong>Blog Post Save Successfully.</span>";
               return $msg;
           }else {
               die("Query Problem".mysqli_errno($link));
           }
       }

   }

    public  function getAllBlogPost(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM blogs ";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }

    public  function getBlogPostById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM blogs WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }

    public function updateBlogPost($data,$id){
        extract($data);
        $image = $_FILES['post_image']['name'];
        if($image){
            $link = Database::db_connection();
            $imageUrl = Blog::blogPostImage();

            $sql = "SELECT * FROM blogs WHERE id='$id'";
            $result= mysqli_query($link, $sql);
            $value = mysqli_fetch_assoc($result);
            unlink($value['post_image']);

            $sql = "UPDATE blogs SET post_title='$post_title', post_image='$imageUrl', post_description='$post_description', publication_status='$publication_status' WHERE id='$id' ";
            $update = mysqli_query($link, $sql);
            if($update){
                $msg = "<span class='success'><strong>Success ! </strong>Blog Post Updated Successfully.</span>";
                return $msg;
            }else {
                $msg = "<span class='error'><strong>Error ! </strong>Blog Post not Updated.</span>";
                return $msg;
            }
        }else{
            $link = Database::db_connection();
            $sql = "UPDATE blogs SET post_title='$post_title',  post_description='$post_description', publication_status='$publication_status' WHERE id='$id' ";
            $update = mysqli_query($link, $sql);
            if($update){
                $msg = "<span class='success'><strong>Success ! </strong>Blog Post Updated Successfully.</span>";
                return $msg;
            }else {
                $msg = "<span class='error'><strong>Error ! </strong>Blog Post not Updated.</span>";
                return $msg;
            }
        }
    }


}