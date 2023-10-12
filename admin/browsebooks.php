<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
?>
<?php
$categoryid=$_REQUEST["catid"];
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$stmt=$conn->prepare("select * from book where categoryid=?");
$stmt->bindParam(1,$categoryid);
$stmt->execute();
$c=$stmt->rowCount();
$isbn=array();
$bookname=array();
$stock=array();
$price=array();
$authorname=array();
$imagename=array();
$booktype=array();
$pdf=array();


//push rows into arrays
if($c>0){
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

    array_push($isbn,$row["isbn"]);
    array_push($bookname,$row["bookname"]);
    array_push($stock,$row["stock"]);
    array_push($price,$row["price"]);
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
           
        
        <?php
        if($c>0){
        ?>    
           
          
            <table class="table">
            <h3>BOOK LIST</h3>
                 <?php
                 $len=count($isbn);
                 for($i=0;$i<$len;$i++)
                 {
                    
                    echo "<tr>";
                     echo "<td>";
                     echo "isbn/pdf no:".$isbn[$i];
                     echo "<br/>Book name:".$bookname[$i];
                     $bookname[$i]=urlencode($bookname[$i]);
                     echo "<br/>";
                     echo "Stock:".$stock[$i];
                     echo "<br/>";
                     echo "Price:".$price[$i];
                     echo "<br/>";
                     echo "Author:".$authorname[$i];
                     $authorname[$i]=urlencode($authorname[$i]);
                     echo "<br/>";
                     if($booktype[$i]=="book")
                     echo "<img src=".$imagename[$i]." height=100 width=100/>";
                     echo "<br/>";
                     echo "Booktype:".$booktype[$i];
                     echo "<br/>";
                     echo "PDF:".$pdf[$i]; 
                     echo "</td>";
                     $i++;
                     if($i<$len){
                        echo "<td>";
                        echo "isbn/pdf no:".$isbn[$i];
                        echo "<br/>Book name:".$bookname[$i];
                        $bookname[$i]=urlencode($bookname[$i]);
                        echo "<br/>";
                        echo "Stock:".$stock[$i];
                        echo "<br/>";
                        echo "Price:".$price[$i];
                        echo "<br/>";
                        echo "Author:".$authorname[$i];
                        $authorname[$i]=urlencode($authorname[$i]);
                        echo "<br/>";
                        if($booktype[$i]=="book")
                        echo "<img src=".$imagename[$i]." height=100 width=100/>";
                        echo "<br/>";
                        echo "Booktype:".$booktype[$i];
                        echo "<br/>";
                        echo "PDF:".$pdf[$i];  
                        echo "</td>";
                    }

                     
                     echo "</tr>";

                 }
                 ?>
            </table>
           
            <?php
                }
                else{
                    echo "No book of the selected category";
             }
            ?>
                               
        
        </div>
        </div>
        <?php
            include('footer.php');
        ?>

    </body>
</html>