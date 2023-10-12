<?php

session_start();

//set a connections
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

   if($_SESSION["searchtype"]=="regular"){
    $categoryid=$_REQUEST["id"];

//create arrays
$stmt=$conn->prepare("select * from book where categoryid=?");
$stmt->bindParam(1,$categoryid);
$stmt->execute();
$c=$stmt->rowCount();
}
 else{
    $bookname=strtoupper($_POST["textcategoryname"]);
    $stmt=$conn->prepare("select * from book where upper(bookname) like '%$bookname%'");
    $stmt->execute();
    $c=$stmt->rowCount();
 }
$categoryid=array();
$isbn=array();
$bookname=array();
$authorname=array();
$imagename=array();
$booktype=array();
$pdf=array();

//push rows into arrays
if($c>0){
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    array_push($isbn,$row["isbn"]);
    array_push($bookname,$row["bookname"]);
    array_push($authorname,$row["author"]);
    array_push($imagename,$row["image"]);
    array_push($booktype,$row["booktype"]);
    array_push($pdf,$row["pdf"]);
}
}
$conn=null;
?>
<html>
    <head>
        <title>View books</title>
        <?php
          include("headerlink.php");
          ?>
        <link rel="stylesheet" href="styless.css"/>
        
    </head>
    <body>
    <?php
                include('header.php');
                ?>

        <div class="container">
            <div class="item">
        <h3>Book list</h3>
        <?php
        if($c>0){
        ?>    

            <table class="table">
                
            <?php
                 $len=count($isbn);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     echo "<td>";
                     echo "isbn:".$isbn[$i];
                     echo "<br/>Book name:".$bookname[$i];
                     $bkname=urlencode($bookname[$i]);
                     echo "<br/>";
                     echo "Author:".$authorname[$i];
                     $aname=urlencode($authorname[$i]);
                     echo "<br/>";
                     echo "Booktype:".$booktype[$i];
                     echo "<br/>";
                     echo "<a href=$pdf[$i]>$pdf[$i]</a>";
                     echo "<br/>";
                     if($booktype[$i]=="book")
                        echo "<img src=".$imagename[$i]." height=100 width=100/>";
                     echo "<br/>";
                     if($booktype[$i]=="book")
                         echo  "<a href=reservestubookform.php?isbn=$isbn[$i]&name=$bkname&auname=$aname>Reserve</a>";
                      echo "</td>";  
                     $i++;
                     if($i<$len){
                        echo "<td>";
                        echo "isbn:".$isbn[$i];
                        echo "<br/>Book name:".$bookname[$i];
                        $bkname=urlencode($bookname[$i]);
                        echo "<br/>";
                        echo "Author:".$authorname[$i];
                        $aname=urlencode($authorname[$i]);
                        echo "<br/>";
                        echo "Booktype:".$booktype[$i];
                        echo "<br/>";
                        echo "<a href=$pdf[$i]>$pdf[$i]</a>";
                        echo "<br/>";
                        if($booktype[$i]=="book")
                        echo "<img src=".$imagename[$i]." height=100 width=100/>";
                        echo "<br/>";
                        if($booktype[$i]=="book")
                         echo  "<a href=reservestubookform.php?isbn=$isbn[$i]&name=$bkname&auname=$aname>Reserve</a>";
                        echo "</td>";
                    }

                     
                     echo "</tr>";

                 }
                 ?>
            </table>
            <?php
                }
                else{
                    echo "No books of the selected category";
             }
            ?>                    
        </div>
        </div>
        <?php
             
               if(empty($_SESSION))
                 {
                     header('location:../studentsigninform.php');
                 }
        ?>
        <?php
                include('footer.php');
        ?>
    </body>
</html>