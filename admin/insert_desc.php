<?php           
                session_start();
                if(!empty($_SESSION['idgroup'])){
                       include 'init.php' ;
                     
                     //  include conction database
                      require_once $includes.'conxDB.php';
                     //  include header
                      include $includes.'header.php' ;
                     $pageTitle="Insert description ";
                  if(isset($_POST['villeD']) && isset($_POST['villeA']) && isset($_POST['description']) ){
                         $description=$_POST['description'] ;
                         $villeD=$_POST['villeD'] ;
                         $villeA=$_POST['villeA'] ;
                         // insert dans le tableau description_voyage 
                         $sql="INSERT INTO description_voyage (description ,villeD,villeA) VALUES (?,?,?)";
                         $req=$con->prepare($sql);
                         $req->execute([ $description , $villeD , $villeA ]);  
                      } ?>
       <div class="container-fluid p-0" style="position: relative;height:100vh;">
           <?php
            require_once $includes.'navbar_admin.php' ;
            include $includes.'dashbord.php' ; 
            ?>                                  
          <div class="container container-sinscrire ">
            <form action="isert_desc.php" method="post" class="col-12 col-md-8  col-lg-6 p-5 form-sinscrire" >
              <h1 style="text-align: center;">description de voyage</h1>
                    description: <br>
                    <input type="text"  name="description" class="form-control"> <br>
                    ville de départ : <br>
                    <input type="text" name="villeD" class="form-control"> <br>
                    ville d'arrivée  : <br>
                    <input type="text" name="villeA" class="form-control"> <br>
                    <input type="submit" name="description" value="description " class="btn_style btn form-control "> <br>
           </form>    
        </div>
      <?php 
      include $includes.'footer.php' ;
         }else{
            header("location:../pages/connEmp.php") ;
         }
?>