<?php
namespace App\classes;

class Portfolio{
    public function savePortfolioTerms($data){
        $link = Database::db_connection();
        $term_class = mysqli_real_escape_string($link, $data['term_class']);
        if( $term_class == ""){
            $msg = "<span class='error'><strong>Error ! </strong>Fields Must Not Be Empty.</span>";
            return $msg;
        }else{
            $sql = "INSERT INTO terms (term_class) VALUES('$term_class')";
            $result = mysqli_query($link, $sql);
            if($result){
                $msg = "<span class='success'><strong>Success ! </strong>Term Inserted Successfully.</span>";
                return $msg;
            }else{
                $msg = "<span class='error'><strong>Error ! </strong>Term not Inserted.</span>";
                return $msg;
            }
        }
    }

    public function getAllTerms(){
        $link = Database::db_connection();
        $sql = "SELECT * FROM terms";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }
    public function getTermsById($id){
        $link = Database::db_connection();
        $sql = "SELECT * FROM terms WHERE term_id='$id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }

    public function updateTermsById($data, $id){
        $link = Database::db_connection();
        $term_class = mysqli_real_escape_string($link, $data['term_class']);
        $sql = "UPDATE terms SET term_class='$term_class' WHERE term_id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $msg = "<span class='success'><strong>Success ! </strong>Terms Update Successfully.</span>";
            return $msg;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }

    public function deleteTermsById($id){
        $link = Database::db_connection();
        $sql = "DELETE FROM terms WHERE term_id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $msg = "<span class='success'><strong>Success ! </strong>Terms Deleted Successfully.</span>";
            return $msg;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }



    public function savePortfolioImage(){
        $link = Database::db_connection();
        $directory = 'uploads/portfolio-img/';
        $imageUrl = $directory.$_FILES['portfolio_image']['name'];

        $check = getimagesize($_FILES['portfolio_image']['tmp_name']);
        if($check){
            if(file_exists($imageUrl)){
                $msg = "<span class='error'><strong>Error ! </strong>File already Exists. Please ty another one</span>";
                return $msg;
            }else{
                if($_FILES['portfolio_image']['size'] > 8000000){
                    $msg = "<span class='error'><strong>Error ! </strong>File size is too large. Maximum file size is 5MB</span>";
                    return $msg;
                }else{
                    $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
                    if ($fileType == 'jpg' || $fileType == 'png') {
                        move_uploaded_file($_FILES['portfolio_image']['tmp_name'], $imageUrl);
                        return $imageUrl;
                    } else{
                        $msg = "<span class='error'><strong>Error ! </strong>File type must be jpg or png</span>";
                        return $msg;
                    }
                }
            }
        }else {
            $msg = "<span class='error'><strong>Error ! </strong>Please use an image file to upload</span>";
            return $msg;
        }
    }


    public function savePortfolio($data){
        $link = Database::db_connection();
        $imageUrl = Portfolio::savePortfolioImage();
        $portfolio_title = mysqli_real_escape_string($link, $data['portfolio_title']);
        $portfolio_link = mysqli_real_escape_string($link, $data['portfolio_link']);
        $term_id = mysqli_real_escape_string($link, $data['term_id']);
        if($imageUrl){
            $sql = "INSERT INTO portfolios (portfolio_title, portfolio_link, term_id, portfolio_image) VALUES('$portfolio_title','$portfolio_link','$term_id', '$imageUrl')";
            $result = mysqli_query($link, $sql);
            if($result) {
                $msg ="<span class='success'><strong>Success ! </strong>Portfolio Save Successfully</span>";
                 return $msg;

            }else {
                die("Query Problem".mysqli_errno($link));
            }
        }
    }

    public function getAllPortfolio(){
        $link = Database::db_connection();
        $sql = "SELECT p.*, t.term_class FROM portfolios as p, terms as t WHERE p.term_id = t.term_id";
        $result = mysqli_query($link, $sql);
        if($result){
            return $result;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }
    public function getPortfolioById($id){
        $link = Database::db_connection();
        $sql = "SELECT p.*, t.term_class FROM portfolios as p, terms as t WHERE p.term_id = t.term_id AND id='$id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        if($value){
            return $value;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($link)."</span>";
            return $msg;
        }
    }

    public function updatePortfolioById($data, $id){
        extract($data);
        $link = Database::db_connection();
        $image = $_FILES['portfolio_image']['name'];
        if($image){
            $imageUrl = Portfolio::savePortfolioImage();

            $sql = "SELECT * FROM portfolios WHERE id='$id'";
            $result = mysqli_query($link, $sql);
            $value = mysqli_fetch_assoc($result);
            unlink($value['portfolio_image']);

           $sql = "UPDATE portfolios SET portfolio_title='$portfolio_title', portfolio_link='$portfolio_link', term_id='$term_id', portfolio_image='$imageUrl' WHERE id='$id' ";
           $update = mysqli_query($link, $sql);
           if($update){
               $msg = "<span class='success'><strong>Success ! </strong>Portfolio Updated Successfully.</span>";
               return $msg;
           }else{
               die("Query Problem".mysqli_error($link));
           }
        }else{
            $link = Database::db_connection();
            $sql = "UPDATE portfolios SET portfolio_title='$portfolio_title', portfolio_link='$portfolio_link', term_id='$term_id' WHERE id='$id' ";
            $update = mysqli_query($link, $sql);
            if($update){
                $msg = "<span class='success'><strong>Success ! </strong>Portfolio Updated Successfully.</span>";
                return $msg;
            }else{
                die("Query Problem".mysqli_error($link));
            }
        }
    }

    public function deletePortfolioById($id){
        $link = Database::db_connection();

        $sql = "SELECT * FROM portfolios WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        $value = mysqli_fetch_assoc($result);
        unlink($value['portfolio_image']);

        $sql = "DELETE FROM portfolios WHERE id='$id'";
        $result = mysqli_query($link, $sql);
        if($result){
            $msg = "<span class='success'><strong>Success ! </strong>Portfolios Deleted Successfully.</span>";
            return $msg;
        }else{
            $msg = "<span class='error'><strong>Error ! </strong>".mysqli_error($this->link)."</span>";
            return $msg;
        }
    }













}