<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
        ?>
<?php
 //set up connection
 $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 //create arrays
 $rollno=array();
 $facultyid=array();
 $bookid=array();
 $issuedate=array();
 $returndate=array();
 $actualreturndate=array();
 $fine=array();
 //prepare select statement
 $stmt=$conn->prepare("select * from booktransactions");
 $stmt->execute();

 //push rows into arrays
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     array_push($rollno,$row["rollno"]);
     array_push($facultyid,$row["facultyid"]);
     array_push($bookid,$row["bookid"]);
     array_push($issuedate,$row["issuedate"]);
     array_push($returndate,$row["returndate"]);
     array_push($actualreturndate,$row["actualreturndate"]);
     array_push($fine,$row["fine"]);
    }
 
 $conn=null;
 ?>
 <html>
     <head>
         <title>View Returned Books</title>
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
             <h3>Returned Book Details</h3>
                 <tr>
                     <td>Rollno</td>
                     <td>Facultyid</td>
                     <td>Bookid</td>
                     <td>Issue Date</td>
                     <td>Return Date</td>
                     <td>Actual Return Date</td>
                     <td>Fine</td>
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
                 ?>
             </table>
         </div>
     </div>
     <?php
               include('footer.php');
               ?>
     </body>
 </html>