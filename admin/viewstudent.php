<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
?>

<?php
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$rollno=array();
$studentname=array();
$phone=array();
$email=array();
$course=array();
$semester=array();


$stmt=$conn->prepare("select * from student");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($rollno,$row["rollno"]);
    array_push($studentname,$row["studentname"]);
    array_push($phone,$row["phone"]);
    array_push($email,$row["emailid"]);
    array_push($course,$row["course"]);
    array_push($semester,$row["semester"]);
}
$conn=null;
?>
<html>
    <head>
        <title>Student Details</title>
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
            <h3>STUDENT LIST</h3>
                <tr>
                    <td>rollno</td>
                    <td>studentname</td>
                    <td>phone</td>
                    <td>email</td>
                    <td>course</td>
                    <td>semester</td>
                </tr>
                <?php
                $len=count($rollno);
                for($i=0;$i<$len;$i++){
                    echo"<tr>";
                    echo"<td>".$rollno[$i]."</td>";
                    echo"<td>".$studentname[$i]."</td>";
                    echo"<td>".$phone[$i]."</td>";
                    echo"<td>".$email[$i]."</td>";
                    echo"<td>".$course[$i]."</td>";
                    echo"<td>".$semester[$i]."</td>";
                    echo"</tr>";
                }
                ?>
            </table>
        </div>
    </div>
            <?php
               include('footer.php');
            ?>
    </body>
</html>