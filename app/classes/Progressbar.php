<?php
namespace App\classes;

class Progressbar{
    public function saveProgress($data){
        $link = Database::db_connection();
        $progress_percent = mysqli_real_escape_string($link, $data['progress_percent']);
        $progress_title = mysqli_real_escape_string($link, $data['progress_title']);
        $progress_color = mysqli_real_escape_string($link, $data['progress_color']);
        if( $progress_percent == "" || $progress_title == "" || $progress_color == ""){
            $msg = "<span class='error'><strong>Error ! </strong>Fields Must Not Be Empty.</span>";
            return $msg;
        }else{
            $sql = "INSERT INTO progress (progress_percent, progress_title, progress_color) VALUES('$progress_percent', '$progress_title', '$progress_color')";
            $result = mysqli_query($link, $sql);
            if($result){
                $msg = "<span class='success'><strong>Success ! </strong>Progress Inserted Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($link)."</span>";
                return $msg;
            }
        }
    }

    public function getAllProgress(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM progress";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }

    public function deleteProgressById($id){
    $link = Database::db_connection();
    $sql = "DELETE FROM progress WHERE id='$id'";
    $result = mysqli_query($link, $sql);
    if($result){
        $msg = "<span class='success'><strong>Success ! </strong>Progress Deleted Successfully.</span>";
        return $msg;
    }else{
        $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
        return $msg;
    }
}




}