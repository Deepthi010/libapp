<?php
              session_start();
              $facultyid=$_SESSION["facultyid"];
               
?>
<?php
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$faculid=array();
$bookid=array();
$reservedate=array();
$status=array();

$stmt=$conn->prepare("select facultyid,bookid,reservedate,status from bookreserve where facultyid=?");
$stmt->bindParam(1,$facultyid);
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($faculid,$row["facultyid"]);
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
                    <td>facultyid</td>
                    <td>bookid</td>
                    <td>reservedate</td>
                    <td>status</td>
                </tr>
                <?php
                $len=count($bookid);
                for($i=0;$i<$len;$i++){
                    echo"<tr>";
                    echo"<td>".$faculid[$i]."</td>";
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
                     header('location:../facultysigninform.php');
                 }
        ?>
        <?php
               include('footer.php');
               ?>  
    </body>
</html>