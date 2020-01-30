<?php
    
    class users extends database
    {
        
        public function read()
        {
            try
            {
                $queryRead="SELECT * FROM users";
                $this->query($queryRead);
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
                        return count($row).' User Listed';
                    }
                    
                }
               
            }
            catch(Throwable $e)
            {
                echo $e;
            }

        }
        function readByUsername($email)
        {
            try
            {
                $queryReadByName = "SELECT * FROM users WHERE email=:email";
                $this->query($queryReadByName);
                $this->bind(':email',$email);
                $row=$this->single();
                return $row;
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            

        }
        function readById($id)
        {
            try
            {   
                $queryReadById = "SELECT * FROM users WHERE id=:id";
                $this->query($queryReadById);
                $this->bind(':id',$id);
                $row=$this->single();
                return $row;

            }catch(Throwable $e)
            {
                echo $e;
            }
        }
     
        public function add($username,$password,$email,$dob)
        {
            
            try
            {
                $queryAdd = "INSERT INTO users(username,password,email,dob) VALUES(:username,:password,:email,:dob)";
                $this->query($queryAdd);
                $this->bind(':username',$username);
                $this->bind(':password',$password);
                $this->bind(':email',$email);
                $this->bind(':dob',$dob);
                $this->execute();
            }
            catch(Throwable $e)
            {
                echo $e;
            }
            if($this->lastInsertId())
            {
                //header('location: index.php');
            
            }
       
               
        }
        function find($searchtxt)
        {
            try
            {   
                $query="SELECT * FROM users WHERE email=:username";
                $this->query($query);
                $this->bind(':username',$searchtxt);
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
            }catch(Throable $e)
            {

            }
        }
        function userUpdate($username,$email,$dob,$id)
        {
            //($name,$email,$dob,$id);
            try
            {
                $query="UPDATE users SET username=:username, email=:email, dob=:dob WHERE id=:id";
                $this->query($query);
                $this->bind(":username",$username);
                $this->bind(":email",$email);
                $this->bind(":dob",$dob);
                $this->bind(":id",$id);
                $this->execute();
            }
            catch(throwable $e)
            {
                echo $e;
            }
        }
        function userDelete($id)
        {
            try
            {
                $query="DELETE FROM users WHERE id=:id";
                $this->query($query);
                $this->bind(":id",$id);
                $this->execute();
            }
            catch(throwable $e)
            {
                echo $e;
            }
        }

    }

?>