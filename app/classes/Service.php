<?php
namespace App\classes;

class Service{
    public function saveService($data){
        $link = Database::db_connection();
        $service_title = mysqli_real_escape_string($link, $data['service_title']);
        $service_text = mysqli_real_escape_string($link, $data['service_text']);
        if( $service_title == "" || $service_text == ""){
            $msg = "<span class='error'><strong>Error ! </strong>Fields Must Not Be Empty.</span>";
            return $msg;
        }else{
            $sql = "INSERT INTO services (service_title, service_text) VALUES('$service_title', '$service_text')";
            $result = mysqli_query($link, $sql);
            if($result){
                $msg = "<span class='success'><strong>Success ! </strong>Service Inserted Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($link)."</span>";
                return $msg;
            }
        }
    }

    public function getAllServices(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM services";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }

    public function getServicesById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM services WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }

    public function updateServicesById($data, $id){
        $link = Database::db_connection();
        $service_title = mysqli_real_escape_string($link, $data['service_title']);
        $service_text = mysqli_real_escape_string($link, $data['service_text']);
        $sql = "UPDATE services SET service_title='$service_title', service_text='$service_text' WHERE id='$id'";
        $update = mysqli_query($link, $sql);
        if($update){
            $msg = "<span class='success'><strong>Success ! </strong>Sevice Update Successfully.</span>";
            return $msg;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }

    public function deleteServicesById($id){
        $link = Database::db_connection();
        $sql = "DELETE FROM services WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if ($result) {
            $msg = "<span class='success'><strong>Success ! </strong>Service Deleted Successfully.</span>";
            return $msg;
        } else {
            $msg = "<span class='error'><strong>Error ! </strong>" . mysqli_error($this->link) . "</span>";
            return $msg;
        }
    }

    public function textShorten($text, $limit = 400){
        $text = $text. " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text.".....";
        return $text;
    }
}