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
 $isbn=array();
 $bookid=array();
 $status=array();
 //prepare select statement
 $stmt=$conn->prepare("select * from bookdetails");
 $stmt->execute();

 //push rows into arrays
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     array_push($isbn,$row["isbn"]);
     array_push($bookid,$row["bookid"]);
     array_push($status,$row["status"]);
 }
 $conn=null;
 ?>
 <html>
     <head>
         <title>View book details</title>
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
             <h3>Book Details</h3>
                 <tr>
                     <td>isbn</td>
                     <td>bookid</td>
                     <td>status</td>
                     <td>edit</td>
                 </tr>
                 <?php
                 $len=count($isbn);
                 for($i=0;$i<$len;$i++){
                     echo"<tr>";
                     echo"<td>".$isbn[$i]."</td>";
                     echo"<td>".$bookid[$i]."</td>";
                     echo"<td>".$status[$i]."</td>";
                     echo "<td><a href=editbookdetailsform.php?isbn=$isbn[$i]&bid=$bookid[$i]&status=$status[$i]>edit</a></td>";
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