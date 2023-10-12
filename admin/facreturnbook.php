<?php
session_start();
 if(empty($_SESSION))
 {
     header('location:../adminsigninform.php');
 }
 ?>

<?php
 $facultyid=$_POST["textfacid"];
 $bookid=$_POST["textbookid"];
 $issuedate=$_POST["textissuedate"];
 $returndate=$_POST["textreturndate"];
 $actualreturndate=$_POST["textactualreturndate"];
 $additionalfine=$_POST["textadditionalfine"];
 $returndate=new DateTime($returndate);
 $actualreturndate=new DateTime($actualreturndate);
 $days=$actualreturndate->diff($returndate)->format("%r%a");
 if($days>=1)
         $fine=$days*0+$additionalfine;
 
 $returndate=$returndate->format('Y-m-d');
 $msg=null;
 $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 $status="";
 try{
    $stmt=$conn->prepare("update booktransactions set returndate=? , fine=? where facultyid=? and bookid=? and issuedate=?");
    $stmt->bindParam(1,$returndate);
    $stmt->bindParam(2,$fine);
    $stmt->bindParam(3,$facultyid);
    $stmt->bindParam(4,$bookid);
    $stmt->bindParam(5,$issuedate);
    $c=$stmt->execute();
   /* echo "additional fine $additionalfine";
    echo "fine $fine";
    echo "c=$c";*/
    if($c==true)
    {
          if($additionalfine>0){
          /*  echo "yes";*/
            $status='NA';
        }
        else{
          /*  echo "no";*/
            $status='Available';
        }
       /* echo "status=$status";*/
        $stmtupdate=$conn->prepare("update bookdetails set status=? where bookid=? and status='NA'");
        $stmtupdate->bindParam(1,$status);
        $stmtupdate->bindParam(2,$bookid);
        $x=$stmtupdate->execute();
       if($x){
        $msg="Book returned successfully ";
        
        }
        else{
            $msg="Book already returned";
        }
    }
    else{
        $msg="Failed to return book";
    }
}
    
    catch(Exception $e){
        $msg=$e->getMessage();
    }

?>
 

 <html>
     <head>
         <title>Return book info</title>
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
  
 
 
 