<?php

    include("function.php");
    include("views/header.php")
    
    
?>
<div class="container mainContainer">
    
    <div class="row">
        <div class="col-md-8 mainContainer">
            
        <h5> <strong>User Post </strong></h5>
        <?php
             displayPost($_GET['id']);
        ?>

        </div>
        <div class="col-md-3 mainContainer">
            <?php 
                displayProfile($_GET['id']);
            
            ?>


        </div>

  </div>
</div> 

<?php include("views/footer.php")?>