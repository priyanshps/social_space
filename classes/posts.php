
<?php
    class posts extends database 
    {
        public function insert($id,$content,$folder)
        {
           try
           {
                $queryAdd="INSERT INTO posts(user_id,content,image) VALUES(:user_id,:content,:image)";
                
                $this->query($queryAdd);
                $this->bind(':user_id',$id);
                $this->bind(':content',$content);
                $this->bind(':image',$folder);
                $this->execute();

           }
           catch(Throwable $e)
           {
               echo $e;
           }

        }
        public function display($id)
        {
            try
            {
                $display = "SELECT posts.post_id, posts.user_id, posts.content,posts.image ,posts.post_date FROM posts 
                INNER JOIN friends ON posts.user_id = friends.friend_id WHERE friends.user_id=:user_id";
                
                $this->query($display);
                $this->bind(':user_id',$_SESSION['id']);
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
                        return count($row)."Data Count";
                    }
                }


            }catch(Throwable $e)
            {
                echo $e;
            }
            

        }
        public function profile($id)
        {
            try
            {
                $query="SELECT * FROM posts WHERE user_id=:user_id";
                $this->query($query);
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

            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        
        
        public function displayOne($id)
        {
            try
            {
                $query="SELECT * FROM posts WHERE post_id=:post_id";
                $this->query($query);
                $this->bind(':post_id',$id);
                $row=$this->single();
                return $row;
            }
            catch(Throwable $e)
            {
                echo $e;
            }
                 
        }
        public function update($postid,$userid,$content,$image)
        {
            try
            {
                $query="UPDATE posts SET content= :content,image= :image 
                WHERE post_id= :post_id AND user_id= :user_id";
                $this->query($query);
                $this->bind(':content',$content);
                $this->bind(':image',$image);
                $this->bind(':post_id',$postid);
                $this->bind(':user_id',$userid);
                $this->execute();
                

            }
            catch(Throwable $e)
            {
                echo $e;
            }
        }
        public function delete($postId)
        {
            try
            {
                    $query="DELETE FROM posts WHERE post_id=:post_id";
                    $this->query($query);
                    $this->bind(':post_id',$postId);
                    $this->execute();
            }
            catch(Throable $e)
            {
                echo $e;
            }

        }
        public function insertComment($user_id,$post_id,$comment_text)
        {
            try
            {
                $insert="INSERT INTO comments(user_id,post_id,comment_text) VALUES(:user_id,:post_id,:comment_text)";
                $this->query($insert);
                $this->bind(":user_id",$user_id);
                $this->bind(":post_id",$post_id);
                $this->bind(":comment_text",$comment_text);
                $this->execute();
            }
            catch(Throable $e)
            {
                echo $e;
            }
        }
        public function showComments($post_id)
        {
            try
            {
                $show="SELECT * FROM comments WHERE post_id=:post_id";
                $this->query($show);
                $this->bind(":post_id",$post_id);
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


            }catch(throable $e)
            {
                echo $e;
            }
        }
        public function updateComment($comment_id,$comment_text)
        {
            try
            {
                $query="UPDATE comments SET comment_text=:comment_text WHERE comment_id=:comment_id";
                $this->query($query);
                $this->bind(":comment_text",$comment_text);
                $this->bind(":comment_id",$comment_id);
                $this->execute();
            }
            catch(throwable $e)
            {
                echo $e;
            }
        }

        public function deleteComment($commentId)
        {
            try
            {
                $query="DELETE FROM comments WHERE comment_id=:comment_id";
                $this->query($query);
                $this->bind(':comment_id',$commentId);
                $this->execute();

            }catch(Throable $e)
            {
                echo $e;
            }
        }
        
    }   

    


?>