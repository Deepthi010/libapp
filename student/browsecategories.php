<?php
session_start();
$_SESSION["searchtype"]="regular";
//set a connections
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//crete arrays
$catid=array();
$catname=array();

//prepare select statements
$stmt=$conn->prepare("select * from category");
$stmt->execute();

//push rows into arrays
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($catid,$row["categoryid"]);
    array_push($catname,$row["category"]);

}
$conn=null;
?>
<html>
    <head>
        <title>View Categories</title>
        <?php
                include('headerlink.php');
                ?>
        
        
    </head>
    <body>
    <?php
                include('header.php');
                ?>
            
              <h3>CATEGORY LIST</h3>
              
               <table class="table" style="width:40%;">
               
               <div align="center">
                 <?php
                 $len=count($catid);
                 for($i=0;$i<$len;$i++)
                 {
                     echo "<tr>";
                     $name=urlencode($catname[$i]);
                     echo"<td><a href=browsestubooks.php?id=$catid[$i]&name=$name>".$catname[$i]."</a></td>";
                     echo "</tr>";

                 }
                 ?>
               </div>
            </table>
            
        <?php
                include('footer.php');
                ?>
    </body>
</html>