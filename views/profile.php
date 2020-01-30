
<div class="container mainContainer">
    
    <div class="row">
        <div class="col-md-8 mainContainer">
            
        <h5> <strong>User Post </strong></h5>
        <?php
             displayPostUser($_SESSION['id']);
        ?>
    

    
        </div>
        <div class="col-md-3 mainContainer">
            <?php 
                displayProfile($_SESSION['id']);
            
            ?>



            <nav class="nav flex-column fixed">
                <a name="profile" class="nav-link active" href="?page=editprofile">Edit Profile</a>
                <a class="nav-link" href="?page=yourfriends">Friends</a>                
            </nav>

            


        </div>



        
  </div>
</div> 