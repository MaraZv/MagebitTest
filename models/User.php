<?php
    class User {
        public $name;
        public $email;
        private $password;

        public function validPassword($password) {
            return $password === $this->password;
        }

        public function update($name) {
            global $db;

            $name = $db->escape_string($name);
            $sql = "UPDATE users SET name='$name' WHERE email='$this->email'";
            $db->query($sql);
    
            return true;
        }

        public static function insert($email, $password, $name) {
            global $db;
            
            $sql = "INSERT INTO users (email, password, name) VALUES ('" .
            $email .
            "', '" .
            $password . 
            "', '" . 
            $name .
            "');";

            $success = $db->query($sql);

            return $success;
        }
        
        public function map($user_data) {
            $this->email = $user_data['email'];
            $this->password = $user_data['password'];

            if (isset($user_data['name'])) {
                $this->name = $user_data['name'];
            }
        }

        public static function get($email) {
            global $db;
           
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $user_data = $result->fetch_assoc();

                $user = new User();
                $user->map($user_data);

                return $user;
            } else {
                return null;
            }
        }
    }
?>