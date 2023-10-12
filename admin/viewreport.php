<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
?>

<?php
//set up connection

$fdate=$_POST["textfdate"];
$tdate=$_POST["texttdate"];
 $rollno=array();
 $facultyid=array();
 $bookid=array();
 $issuedate=array();
 $returndate=array();
 $actualreturndate=array();
 $fine=array();
 $total=0;
//prepere select statemnt
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt=$conn->prepare("select rollno,facultyid,bookid,issuedate,returndate,actualreturndate,fine from booktransactions where issuedate between ? and ?");
$stmt->bindParam(1,$fdate);
$stmt->bindParam(2,$tdate);
$stmt->execute();


//push rows into arrays

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
     array_push($rollno,$row["rollno"]);
     array_push($facultyid,$row["facultyid"]);
     array_push($bookid,$row["bookid"]);
     array_push($issuedate,$row["issuedate"]);
     array_push($returndate,$row["returndate"]);
     array_push($actualreturndate,$row["actualreturndate"]);
     array_push($fine,$row["fine"]);
     $total+=$row["fine"];
}

$conn=null;
?>
<html>
    <head>
        <title>Report</title>
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
    

    <table class="table">
        <h2>
        <tr>
          <h4>  </th>Summary of transactions between <?php echo $fdate." and ".$tdate;?></th> </h4>
        </tr>
        <tr>
            <td>rollno</td>
            <td>facultyid</td>
            <td>bookid</td>
            <td>issuedate</td>
            <td>returndate</td>
            <td>actualreturndate</td>
            <td>fine</td>
        </tr> 
        <?php
                 $len=count($bookid);
                 for($i=0;$i<$len;$i++){
                     echo"<tr>";
                     echo"<td>".$rollno[$i]."</td>";
                     echo"<td>".$facultyid[$i]."</td>";
                     echo"<td>".$bookid[$i]."</td>";
                     echo"<td>".$issuedate[$i]."</td>";
                     echo"<td>".$returndate[$i]."</td>";
                     echo"<td>".$actualreturndate[$i]."</td>";
                     echo"<td>".$fine[$i]."</td>";
                    echo"</tr>";
                 }
                 echo "Total fine collected=".$total;
                ?>
       
</table>
<?php
                include('footer.php');
            ?>
</body>
</html>