<?php

    class friend extends database 
    {
        public function insert($user_id,$friend_id)
        {
            try
            {
                $query="INSERT INTO friends(user_id,friend_id) VALUE(:user_id,:friend_id)";
                $this->query($query);
                $this->bind(":user_id",$user_id);
                $this->bind(":friend_id",$friend_id);
                $this->execute();
            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function isFriend()
        {
            try
            {
                $query="SELECT * FROM friends WHERE user_id=:user_id";
                $this->query($query);
                $this->bind(":user_id",$_SESSION['id']);
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }
            }
            catch(Throwable $e)
            {
                echo $e;
            }


        }
        public function readFriend($id)
        {
            try
            {
                $display = "SELECT users.id,users.username,users.email FROM users 
                INNER JOIN friends ON users.id = friends.friend_id WHERE friends.user_id=:user_id";
                $this->query($display);
                $this->bind(':user_id',$id);
                
                $i=0;
                while($row=$this->resultset())
                {
                    if($i<count($row))
                    {
                        yield $row[$i];
                        $i++;
                    }
                    else
                    {
                        return count($row);
                    }
                }

            }catch(Throwable $e)
            {
                echo $e;

            }
            
        }

        public function delete($userId,$friendId)
        {
            try
            {
                    $query="DELETE FROM friends WHERE user_id=:user_id AND friend_id=:friend_id";
                    $this->query($query);
                    $this->bind(':user_id',$userId);
                    $this->bind(':friend_id',$friendId);
                    $this->execute();
            }
            catch(Throable $e)
            {
                echo $e;
            }

        }
    
    
    }
    
    
    



?>