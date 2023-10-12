<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
       ?>
<?php
 //fetch posted data
 
 $isbn=$_POST["textisbn"];
 $bookid=$_POST["textbookid"];
 $status=$_POST["textstatus"];
 $msg=null;
 try{
    $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare('update bookdetails set status=? where bookid=?');
    
    $stmt->bindParam(1,$status);
    $stmt->bindParam(2,$bookid);
   
    $stmt->execute();
    $c=$stmt->rowCount();

    if($c==1){
        $msg="Book details update done";
    }else{
        $msg="Book details update failed";
    }
  }catch(Exception $e){
      $msg="Book details update failed. ". $e->getMessage();
  }
  finally{
      $conn=null;
  }
  //update in table
  ?>
  <html>
  <head>
        <title>Edit book details</title>
        <link rel="stylesheet" href="styles.css">
        <?php
          include("headerlink.php");
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