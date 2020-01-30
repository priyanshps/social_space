
<div class="container mainContainer">
    <div class="row">
        <div class="col-md-8 mainContainer">
          
        <form class="form-inline" method="POST">
            
            <input type="text" class="form-control mb-2 mr-sm-2" name="searchTxt" placeholder="Search">
            <button type="submit" name="searchBtn" id="searchBtn" class="btn btn-primary mb-2">Search</button>
        </form>
        
       
        <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <?php 
            
                    if(isset($_POST['searchBtn']))
                    {
                        searchFriends($_POST['searchTxt']);
                    }
                    else
                    {
                        displayFriends();
                    }
            
                
                    
                    
                ?>
                </tbody>
        </table>     
           
        </div>
        <div class="col-md-4 mainContainer">
        
        <?php 
       
        displayGroups();
        
        
        ?>
    



        </div>
    </div>
</div>


