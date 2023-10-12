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
 $catid=array();
 $catname=array();

 //prepare select statement
 $stmt=$conn->prepare("select * from category");
 $stmt->execute();

 //push rows into arrays
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     array_push($catid,$row["categoryid"]);
     array_push($catname,$row["category"]);
 }
 $conn=null;
 ?>
 <html>
     <head>
         <title>View categories</title>
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
             <h3>CATEGORY DETAILS</h3>
                 <tr>
                     <td>Categoryid</td>
                     <td>Category</td>
                     <td>Edit category</td>
                     <td>View book </td>
                     <td>View book pdf</td>
                     <td>Browse books</td>
                 </tr>
                 <?php
                 $len=count($catid);
                 for($i=0;$i<$len;$i++){
                     echo"<tr>";
                     echo"<td>".$catid[$i]."</td>";
                     echo"<td>".$catname[$i]."</td>";
                     $name=urlencode($catname[$i]);
                     echo"<td><a href=editcategoryform.php?id=$catid[$i]&name=$name>".$catname[$i]."</a></td>";
                     echo"<td><a href=addbookform.php?catid=$catid[$i]>Add book info</a></td>";
                     echo"<td><a href=addpdfform.php?catid=$catid[$i]>Add pdf info</a></td>";
                     echo"<td><a href=browsebooks.php?catid=$catid[$i]>Browse books</a></td>";
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