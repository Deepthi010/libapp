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
$facultyid=array();
$reservedate=array();
$bookid=array();


$stmt=$conn->prepare("select * from bookreserve where status='reserved'");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($rollno,$row["rollno"]);
    array_push($facultyid,$row["facultyid"]);
    array_push($reservedate,$row["reservedate"]);
    array_push($bookid,$row["bookid"]);
}
$conn=null;
?>
<html>
    <head>
        <title>Reserved book details</title>
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
              <h3>RESERVED BOOK LIST</h3>
                <tr>
                    <td>rollno</td>
                    <td>facultyid</td>
                    <td>reservedate</td>
                    <td>bookid</td>
                    <td>Faculty issue book</td>
                    <td>Student issue book</td> 
                    </tr>
                <?php
                $len=count($bookid);
                for($i=0;$i<$len;$i++){
                    echo"<tr>";
                    echo"<td>".$rollno[$i]."</td>";
                    echo"<td>".$facultyid[$i]."</td>";
                    echo"<td>".$reservedate[$i]."</td>";
                    echo"<td>".$bookid[$i]."</td>";
                    if(isset($facultyid[$i])){
                        echo"<td><a href=facbookissueform.php?facid=$facultyid[$i]&bookid=$bookid[$i]>Issue book</a></td>";
                        echo "<td></td>";
                    }
                    if(isset($rollno[$i])){
                        echo "<td></td>";                    
                        echo"<td><a href=stubookissueform.php?roll=$rollno[$i]&bookid=$bookid[$i]>Issue book</a></td>";
                    }
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