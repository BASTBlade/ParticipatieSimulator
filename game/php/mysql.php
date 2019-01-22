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
            $hash = $GLOBALS["hash"];
            $cryptedpw = crypt($password,$hash);
            
            $conn = $this->getConnection();
            if($exec = $conn->prepare("INSERT INTO user_data(username,password,email) VALUES (?,?,?)")){
                $exec->bind_param("sss",$username,$cryptedpw,$email);
                $exec->execute();
                $this->getConnection()->close();
            }
        }

        public function login($username,$password,$remember){
            $hash = $GLOBALS["hash"];
            $cryptedpw = crypt($password,$hash);
            
            $conn = $this->getConnection();
            if($exec = $conn->prepare("SELECT id,username,email FROM user_data WHERE `username` = ? AND `password` = ?")){
                $exec->bind_param("ss",$username,$cryptedpw);
                $exec->execute();
                $exec->bind_result($id,$username,$email);
                $exec->fetch();
                $this->getConnection()->close();
                if($id != null){
                    $data = array("id" => $id,"username"=>$username,"email"=>$email);
                    login($data,$remember);
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

        public function checkRecoveryKey($key){
            $conn = $this->getConnection();
            if($exec = $conn->prepare("SELECT user_id FROM password_recovery WHERE recovery_key = ?")){
                $exec->bind_param("s",$key);
                $exec->execute();
                $exec->bind_result($id);
                $exec->fetch();
                $this->getConnection()->close();
                if($id != null){
                    return $id;
                }
                else{
                    return false;
                }
            }

        }
        public function changePasswordWithRecovery($id,$password,$key){
            $conn = $this->getConnection();
            if($exec = $conn->prepare("DELETE FROM password_recovery WHERE recovery_key = ? AND user_id = ?")){
                $exec->bind_param("ss",$key,$id);
                $exec->execute();
            }
            if($exec2 = $conn->prepare("UPDATE user_data SET password= ? WHERE id = ?")){
                $hash = $GLOBALS["hash"];
                $cryptedpw = crypt($password,$hash);

                $exec2->bind_param("ss",$cryptedpw,$id);
                $exec2->execute();

                return true;
            }
        }

        public function isAccountRecoverable($id){
            $conn = $this->getConnection();
            if($exec = $conn->prepare("SELECT user_id FROM password_recovery WHERE user_id = ?")){
                $exec->bind_param("s",$id);
                $exec->execute();
                $exec->bind_result($id);
                $exec->fetch();
                $this->getConnection()->close();
                if($id != null){
                    return false;
                }
                else{
                    return true;
                }
            }
        }


        public function setRecoveryKey($id,$key){
            if($this->isAccountRecoverable($id)){
                $conn = $this->getConnection();
                if($exec = $conn->prepare("INSERT INTO password_recovery(user_id,recovery_key) VALUES(?,?)")){
                    $exec->bind_param("ss",$id,$key);
                    $exec->execute();
                    $this->getConnection()->close();
                }
            }
        }

        function saveMapToDatabase($mapname,$tiles){
            if($mapname != null && $tiles != null){
                $conn = $this->getConnection();
                if($exec = $conn->prepare("INSERT INTO maps(name,creator_id) VALUES (?,?)")){
                    $exec->bind_param("ss",$mapname,$_SESSION["loggedin"]["id"]);
                    if($exec->execute()){
                        $lastid = $exec->insert_id;
                        $this->getConnection()->close();
                        foreach($tiles as $tile){
                            $this->saveTileToDatabase($lastid,$tile);
                        }
                        return "Query Done";
                    }
                    else{
                        $this->getConnection()->close();
                        return "Query Failed";
                    }
                }
                else{
                    return "Can't perform query";
                }
            }
            else{
                return "No data given";
            }
        }
        function saveTileToDatabase($map_id,$tile){
            if($map_id != null && $tile != null){
                $conn = $this->getConnection();
                if($exec = $conn->prepare("INSERT INTO tiles(map_id,starttile,background,maprow,position) VALUES (?,?,?,?,?)")){
                    $exec->bind_param("iisii",$map_id,$tile["starttile"],$tile["background"],$tile["maprow"],$tile["position"]);
                    if($exec->execute()){
                        $this->getConnection()->close();
                    }
                }
            }
        }
        function getMap($id){
            $conn = $this->getConnection();
            $map = array();
            $map["id"] = $id;
            if($exec = $conn->prepare("SELECT name,creator_id FROM maps WHERE id = ?")){
                $exec->bind_param("i",$id);
                $exec->execute();
                $exec->bind_result($name,$creator_id);
                $exec->fetch();
                $this->getConnection()->close();
                $map["name"] = $name;
                $map["creator_id"] = $creator_id;
                if($map["name"] != null && $map["creator_id"] != null){
                    $conn = $this->getConnection();
                        if($exec2 = $conn->prepare("SELECT id,map_id,starttile,background,maprow,position FROM tiles WHERE map_id = ?")){
                            $exec2->bind_param("i",$id);
                            $exec2->execute();
                            $result = $exec2->get_result();
                            $counter = 0;
                            while($row = $result->fetch_assoc()){
                                $map["tiles"][$counter] = array(
                                    "tile_id" => $row["id"],
                                    "map_id" => $row["map_id"],
                                    "starttile" => $row["starttile"],
                                    "background" => $row["background"],
                                    "maprow" => $row["maprow"],
                                    "position" => $row["position"]
                                );
                                $counter++;

                            }
                            $exec2->close();
                            return $map;
                        }

                }
            }
            $this->getConnection()->close();
        }
    }
?>