<?php
 session_start();
 $catid=$_POST["textcatid"];
 $isbn=$_POST["textisbn"];
 $bookname=$_POST["textbookname"];
 $stock=$_POST["textstock"];
 $price=$_POST["textprice"];
 $author=$_POST["textauthor"];
 $booktype=$_POST["textbooktype"];
 try{
     if(isset($_FILES["file1"]["type"]))
     {
         $validextensions=array("jpeg","jpg","png");
         //split file,extension and store into $temporary
         $temporary=explode(".",$_FILES["file1"]["name"]);
         //get file extension from $temporary variable
         $file_extension=end($temporary);
         //check the mine type provided by the browser
         if((($_FILES["file1"]["type"]=="image/png")
             ||($_FILES["file1"]["type"]=="image/jpg")
             ||($_FILES["file1"]["type"]=="image/jpeg"))
             &&($_FILES["file1"]["size"]<500000)
             &&in_array($file_extension,$validextensions))
             {
                 //if file was not upload correctly or partially uploaded,returns 0 if valid
                 if($_FILES["file1"]["error"]>0)
                 $msg=$_FILES["file1"]["error"];
                 //check if file is already uploaded
                 else if(file_exists("../image/".$_FILES["file1"]["name"]))
                 $msg="This file already exists.";
                 else
                 {
                     $sourcePath=$_FILES['file1']['tmp_name'];
                     $targetPath="../image/".$_FILES['file1']['name'];
                     move_uploaded_file($sourcePath,$targetPath);
                     $photo=$targetPath;
                     $status="ok";
                 }
             }
             else
             {
                 $msg="Invalid file size or type";
             }
     }
     else
     {
         $msg="Please select file";
     }
     if($status=="ok")
     {
         $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt=$conn->prepare("insert into book(categoryid,isbn,bookname,stock,price,author,image,booktype)values(?,?,?,?,?,?,?,?)");
             $stmt->bindParam(1,$catid);
             $stmt->bindParam(2,$isbn);
             $stmt->bindParam(3,$bookname);
             $stmt->bindParam(4,$stock);
             $stmt->bindParam(5,$price);
             $stmt->bindParam(6,$author);
             $stmt->bindParam(7,$photo);
             $stmt->bindParam(8,$booktype);
             $stmt->execute();
             $msg=" Book added";
     }
 }
 catch(Exception $e)
 {
     $msg="Book not added".$e->getMessage();
 }
 finally
 {
     $conn=null;
 }

          
           if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
?>
 

 <html>
     <head>
         <title>Add book info</title>
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
  </body>
 </html>
 
 
 