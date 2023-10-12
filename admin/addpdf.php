<?php
 session_start();
 $bookname=$_POST["textbookname"];
 $author=$_POST["textauthor"];
 $booktype=$_POST["textbooktype"];
 $isbn=$_POST["textisbn"];
 $categoryid=$_POST["textcatid"];
 $status=null;
 try{
     if(isset($_FILES["file2"]["type"]))
     {
         $validextensions=array("pdf");
         //split file,extension and store into $temporary
         $temporary=explode(".",$_FILES["file2"]["name"]);
         //get file extension from $temporary variable
         $file_extension=end($temporary);
         //check the mine type provided by the browser
         if((($_FILES["file2"]["type"]=="application/pdf"))
             &&in_array($file_extension,$validextensions))
             {
                 //if file was not upload correctly or partially uploaded,returns 0 if valid
                 if($_FILES["file2"]["error"]>0)
                 $msg=$_FILES["file2"]["error"];
                 //check if file is already uploaded
                 else if(file_exists("../image/".$_FILES["file2"]["name"]))
                 $msg="This file already exists.";
                 else
                 {
                     $sourcePath=$_FILES['file2']['tmp_name'];
                     $targetPath="../image/".$_FILES['file2']['name'];
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
         $stmt=$conn->prepare("insert into book(categoryid,isbn,bookname,author,booktype,pdf)values(?,?,?,?,?,?)");
             $stmt->bindParam(1,$categoryid);
             $stmt->bindParam(2,$isbn);
             $stmt->bindParam(3,$bookname);
             $stmt->bindParam(4,$author);
             $stmt->bindParam(5,$booktype);
             $stmt->bindParam(6,$photo);
             $stmt->execute();
             $msg="Pdf added";
     }
 }
 catch(Exception $e)
 {
     $msg="Pdf not added";
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
         <title>Add pdf info</title>
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
  
 
 
 