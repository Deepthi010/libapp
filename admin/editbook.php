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
 $bookname=$_POST["textbookname"];
 $stock=$_POST["textstock"];
 $price=$_POST["textprice"];
 $author=$_POST["textauthor"];
 $newprice=$_POST["textnewprice"];
 $newstock=$_POST["textnewstock"];
 $msg=null;
 try{
    $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt=$conn->prepare('update book set stock=stock+?,price=?,bookname=?,author=? where isbn=?');
    
    $stmt->bindParam(1,$newstock);
    $stmt->bindParam(2,$newprice);
    $stmt->bindParam(3,$bookname);
    $stmt->bindParam(4,$author);
    $stmt->bindParam(5,$isbn);
    $stmt->execute();
    $c=$stmt->rowCount();

    if($c==1){
        $msg="Book update done";
    }else{
        $msg="Book update failed";
    }
  }catch(Exception $e){
      $msg="Book update failed. ". $e->getMessage();
  }
  finally{
      $conn=null;
  }
  //update in table
  ?>
  <html>
  <head>
        <title>Edit book</title>
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