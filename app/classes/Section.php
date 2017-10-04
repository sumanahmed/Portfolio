<?php
namespace App\classes;
use App\classes\Database;

class Section{

    public function updateSection($data){
        extract($data);
        $link = Database::db_connection();
        $sql = "UPDATE sections SET 
                about_title='$about_title', 
                about_content='$about_content', 
                
                skill_title='$skill_title', 
                skill_content='$skill_content',
                 
                portfolio_s_title='$portfolio_s_title', 
                portfolio_s_content='$portfolio_s_content', 
                
                service_title='$service_title', 
                service_content='$service_content',
                
                blog_title='$blog_title', 
                blog_content='$blog_content', 
                
                contact_title='$contact_title', 
                contact_content='$contact_content'                
               
                WHERE id=1 ";
        $update = mysqli_query($link, $sql);
        if($update){
            $msg = "<span class='success'><strong>Success ! </strong>Section Content Updated Successfully.</span>";
            return $msg;
        }else{
            die("Query Problem".mysqli_error($link));
        }
    }

    public function getAllSectionsValues(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM sections";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        return $value;
    }
}