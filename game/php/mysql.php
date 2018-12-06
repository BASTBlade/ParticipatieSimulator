<?php
    class MySql{
        private $username = "participatiesimulator";
        private $password = "o8ZM6tcjPrcq81hV";
        private $servername = "localhost";
        private $databasename = "participatiesimulator";
        public function __construct(){
            
        }
        private function getConnection(){
            $connection = new mysqli("localhost","root","","participatiesimulator");
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            } 
            return $connection;
        }

        public function select($query){
            $conn = $this->getConnection();

            $result = $conn->query($query);
            while($row = $result->fetch_assoc()){
                echo "done";
            }
            if( $result === true){
                echo "done";
            }
            else{

            }
            $this->getConnection()->close();
        }

        public function exec($query){
            $conn = $this->getConnection();
            $result = $conn->query($query);
            if($result != null){
                return true;
            }
            else{
                return false;
            }
            $this->getConnection()->close();
        }

        public function usernameExists($username){
            $conn = $this->getConnection();
            if($exec = $conn->prepare("SELECT id FROM user_data WHERE username = ?")){
                $exec->bind_param("s",$username);
                $exec->execute();
                $exec->bind_result($result);
                $exec->fetch();
                $this->getConnection()->close();
                if($result != null){
                    return $result;
                }
                else{
                    return false;
                }
            }            
        }

        public function registerAccount($username,$email,$password){
            $hash = "PartSim2019";
            $cryptedpw = crypt($password,$hash);
            
            $conn = $this->getConnection();
            if($exec = $conn->prepare("INSERT INTO user_data(username,password,email) VALUES (?,?,?)")){
                $exec->bind_param("sss",$username,$cryptedpw,$email);
                $exec->execute();
                $this->getConnection()->close();
            }
        }

        public function login($username,$password){
            $hash = "PartSim2019";
            $cryptedpw = crypt($password,$hash);
            
            $conn = $this->getConnection();
            if($exec = $conn->prepare("SELECT id,username,email FROM user_data WHERE `username` = ? AND `password` = ?")){
                $exec->bind_param("ss",$username,$cryptedpw);
                $exec->execute();
                $exec->bind_result($id,$username,$email);
                $exec->fetch();
                $this->getConnection()->close();
                if($id != null){
                    return true;
                }
                else{
                    return false;
                }

            }
        }

        public function getDataFromId($id){
            $conn = $this->getConnection();
            if($exec = $conn->prepare("SELECT id,username,email FROM user_data WHERE id = ?")){
                $exec->bind_param("s",$id);
                $exec->execute();
                $exec->bind_result($id,$username,$email);
                $exec->fetch();
                $this->getConnection()->close();
                if($id != null){
                    $data = array("id" => $id,"username"=>$username,"email"=>$email);
                    return $data;
                }
                else{
                    return false;
                }
            }
        }
    }
?>