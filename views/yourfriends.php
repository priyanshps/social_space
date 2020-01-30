<div class="container mainContainer">
    <div class="row">
        <div class="col-md-8 mainContainer">
          
        
        <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php yourFriends($_SESSION['id']); ?>

                </tbody>
        </table>     
           
        </div>
        <div class="col-md-4 mainContainer">
        
        <?php 
        
            if(isset($_POST['.viewUser']))
            {
                displayGroups();
            }
        
        
        
        
        ?>
    



        </div>
    </div>
</div>


