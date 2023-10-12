
<?php

session_start();
 if(empty($_SESSION))
   {
       header('location:../adminsigninform.php');
   }
?>




<?php
//1. fetch the input
  $categoryname=$_POST["textcategory"];
  $msg=null;
//2. connect to mysql database
  $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//3. prepare statement to insert data into the category table
try{
    $stmt=$conn->prepare("insert into category(category) values(?)");
    $stmt->bindParam(1,$categoryname);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="Category inserted";
    }else{
            $msg="Failed to insert category";
        }
    }catch(Exception $e){
        $msg="Duplicate entry";
    }

//4. close the connection to the database
finally{
    
    $conn=null;
}
?>
<html>
  <head>
        <title>Add Category</title>
        <?php
        include('headerlink.php');
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
        include('header.php');
        ?>
        <div class="container">
            
            <div class="item">
                <h4><?php  echo $msg; ?></h4>
            </div>
        </div>
        <?php
        include('footer.php');
  ?> 
     </body>
    </html>
 
    