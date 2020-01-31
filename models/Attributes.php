<?php
    class Attributes {
        public $image;
        public $birthday;
        public $interests;
        public $user_id;

        public static function insert($image, $birthday, $interests, $user_id) {
            global $db;

            $sql = "INSERT INTO attributes (image, birthday, interests, user_id) VALUES ('" .
            $image . 
            "', '" .
            $birthday . 
            "', '" .
            $interests .  
            "', '" . 
            $user_id .
            "');";

            return $db->query($sql);
        }

        public function update($image, $birthday, $interests) {
            global $db;

            $user_id = $_SESSION['user_id'];
            $sql = "UPDATE attributes SET image='$image', birthday='$birthday', interests='$interests' WHERE user_id='$user_id'";
    
            $db->query($sql);
    
            return true;
        }

        public static function map($data) {
            $attributes = new Attributes();
            
            $attributes->image = $data['image'];
            $attributes->birthday = $data['birthday'];
            $attributes->interests = $data['interests'];
            $attributes->user_id = $data['user_id'];
            
            return $attributes;
        }

        public static function get($user_id) {
            global $db;
            $sql = "SELECT * FROM attributes WHERE user_id='$user_id'";

            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $attributes = Attributes::map($row);

                return $attributes;
            } 
            return null;
            
        }
    }
?>