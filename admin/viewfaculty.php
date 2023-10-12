
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

$facultyid=array();
$facultyname=array();
$phone=array();
$email=array();


$stmt=$conn->prepare("select * from faculty");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($facultyid,$row["facultyid"]);
    array_push($facultyname,$row["facultyname"]);
    array_push($phone,$row["phone"]);
    array_push($email,$row["emailid"]);
    
}
$conn=null;
?>
<html>
    <head>
        <title>Faculty Details</title>
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
            <h3>FACULTY LIST</h3>
                <tr>
                    <td>facultyid</td>
                    <td>facultyname</td>
                    <td>phone</td>
                    <td>email</td>
                </tr>
                <?php
                $len=count($facultyid);
                for($i=0;$i<$len;$i++){
                    echo"<tr>";
                    echo"<td>".$facultyid[$i]."</td>";
                    echo"<td>".$facultyname[$i]."</td>";
                    echo"<td>".$phone[$i]."</td>";
                    echo"<td>".$email[$i]."</td>";
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