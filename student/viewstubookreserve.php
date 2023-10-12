<?php
    session_start();
    $rollno=$_SESSION["rollno"]

?>

<?php
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$rollnum=array();
$bookid=array();
$reservedate=array();
$status=array();

$stmt=$conn->prepare("select rollno,bookid,reservedate,status from bookreserve where rollno=?");
$stmt->bindParam(1,$rollno);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($rollnum,$row["rollno"]);
    array_push($bookid,$row["bookid"]);
    array_push($reservedate,$row["reservedate"]);
    array_push($status,$row["status"]);
}
$conn=null;
?>
<html>
    <head>
        <title>view reserve book</title>
        <?php
               include('headerlink.php');
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
               include('header.php');
               ?>
        <div class="container">
            
            <div class="item">
            <table class="table">
            <h3>RESERVED BOOKS</h3>
                <tr>
                    <td>rollno</td>
                    <td>bookid</td>
                    <td>reservedate</td>
                    <td>status</td>
            </tr>
                <?php
                $len=count($bookid);
                for($i=0;$i<$len;$i++){
                    echo"<tr>";
                    echo"<td>".$rollnum[$i]."</td>";
                    echo"<td>".$bookid[$i]."</td>";
                    echo"<td>".$reservedate[$i]."</td>";
                    echo"<td>".$status[$i]."</td>";
                    echo"</tr>";
                }
                ?>
            </table>
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