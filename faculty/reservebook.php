<?php
//get all the values from session and from cartform
session_start();
$isbn=$_SESSION["isbn"];
$facultyid=$_SESSION["facultyid"];
$reservedate=$_POST["textreservedate"];
$bookid=$_POST["textbookid"];
$msg=null;
$count=null;
//insert to bookreserve table
//open conn

$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try{
    
       $stmt1=$conn->prepare("select count(*) as samebookcount from bookreserve where bookid in 
       (select bookid from bookdetails where isbn=? and facultyid=?)");
       $stmt1->bindParam(1,$isbn);
       $stmt1->bindParam(2,$facultyid);
       $stmt1->execute();
       $row1=$stmt1->fetch(PDO::FETCH_ASSOC);
       $samebookcount=$row1["samebookcount"];
    
       $stmt2=$conn->prepare("select count(*) as bookcount from bookreserve where facultyid=?");
       $stmt2->bindParam(1,$facultyid);
       $stmt2->execute();
       $row2=$stmt2->fetch(PDO::FETCH_ASSOC);
       $bookcount=$row2["bookcount"];
    
       if($samebookcount==1){
            $msg="You have already reserved this book ";
       }
       else if($bookcount==2){
        $msg="You have already reserved two books, cannot reserve now";
       }    
       else{
            //build the stmt to check
            $stmt=$conn->prepare("insert into bookreserve(facultyid,reservedate,bookid) values (?,?,?)");
            $stmt->bindParam(1,$facultyid);
            $stmt->bindParam(2,$reservedate);
            $stmt->bindParam(3,$bookid);
            $stmt->execute();
            $c=$stmt->rowCount();
            
          if($c==1){
                //update status as 'Reserved' where bookid=?
                $stmtupdate=$conn->prepare("update bookdetails set status='Reserved' where bookid=?");
                $stmtupdate->bindParam(1,$bookid);
                $stmtupdate->execute();

               $msg="Your book has been reserved. Collect it within 7 days ";
                }
        else{
            $msg="Failed to reserve the book,retry...";
            }
        }
    }
catch(Exception $e){
    $msg="Failed to reserve the book,retry...".$e->getMessage();

    }
?>
<html>
     <head>
         <title>Reserve book</title>
         <link rel="stylesheet" href="styles.css">
         <?php
    include ('headerlink.php');
    ?> 
     </head>
  <body>
  <?php
                 include('header.php');
             ?>
     <div class="container">
         
         <div class="item">
             <h4><?php echo $msg; ?></h4>
         </div>
     </div>
     <?php
                 include('footer.php');
             ?>
          </body>
        </html>
  
 
 
 