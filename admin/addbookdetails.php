<?php
session_start();
 if(empty($_SESSION))
 {
     header('location:../adminsigninform.php');
 }

?>
<?php
 
//1. fetch the input
  $isbn=$_POST["textisbn"];
  $bookid=$_POST["textbookid"];
  $msg=null;
//2. connect to mysql database
  $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
  $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//3. prepare statement to insert data into the category table
try{
    $stmt=$conn->prepare("insert into bookdetails(isbn,bookid) values(?,?)");
    $stmt->bindParam(1,$isbn);
    $stmt->bindParam(2,$bookid);
    $stmt->execute();
    $c=$stmt->rowCount();
    if($c>0){
        $msg="Book inserted";
    }else{
            $msg="Failed to insert book";
        }
    }catch(Exception $e){
        $msg="Duplicate bookid ";
    }

//4. close the connection to the database
    finally{
        
        $conn=null;
    }               
?>
<html>
        <head>
            <title>Add book</title>
            <?php
               include("headerlink.php");
            ?>
        </head>
        <body>
            <?php
                include("header.php");
            ?>
           <h4> <?php echo $msg;?></h4>
            
        </body>
    </html>
<?php
        include("footer.php");
?>   