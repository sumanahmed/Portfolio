<?php
namespace App\classes;

class Contact{
    public function sendEmail($data){
        $link = Database::db_connection();

        $name = $data['name'];
        $email = $data['email'];
        $message = $data['message'];
        $from = 'From:'.$email;
        $to = 'suman777333@gmai.com';
        $subject = 'Customer Inquiry';
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";

        if ($_POST['submit']) {
            if (mail ($to, $subject, $body, $from)) {
                $msg = "<span class='success'><strong>Success ! </strong>Your message has been sent.</span>";
                return $msg;
            } else {
                $msg = "<span class='success'><strong>Success ! </strong>Something went wrong, go back and try again.</span>";
                return $msg;
            }
        }
    }


}