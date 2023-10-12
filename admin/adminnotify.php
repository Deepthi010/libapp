<?php
         session_start();
            
               if(empty($_SESSION))
                 {
                     header('location:../facultysigninform.php');
                 }
?>
 <?php
 //set up connection
 $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 //create arrays
 $roll=array();
 $faculid=array();
 $bookid=array();
 $issuedate=array();
 $returndate=array();
 $actualreturndate=array();
 $emailid=array();
 //prepare select statement
 $tday=date('Y-m-d');
 
 $stmt=$conn->prepare("select booktransactions.rollno,issuedate,actualreturndate,bookid, returndate, emailid from booktransactions 
  inner join student on booktransactions.rollno=student.rollno where actualreturndate<=? and returndate is null");
 $stmt->bindParam(1,$tday);
 $stmt->execute();
 $stmt->rowCount();
 //push rows into arrays
 while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     array_push($roll,$row["rollno"]);
     
     array_push($bookid,$row["bookid"]);
     array_push($issuedate,$row["issuedate"]);
     array_push($returndate,$row["returndate"]);
     array_push($actualreturndate,$row["actualreturndate"]);
     array_push($emailid,$row["emailid"]);
    }
 
 $conn=null;
 ?>
 <html>
     <head>
         <title>View book transactions</title>
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
             <h3>Due date list</h3>
                 <tr>
                     <td>Rollno</td>
                    
                     <td>Bookid</td>
                     <td>Issue Date</td>
                     <td>Return Date</td>
                     <td>Actual Return Date</td>
                  </tr>
                 <?php
                 $notify="";
                 $header="deepthighantennavar2001@gmail.com";
                 $header.="MIME-Version:1.0"."\r\n";
                 $header.='Content-Type: text/html; charset=ISO-8895-1' ."\r\n";
                 $subject="Due date notification";
                 $to="";
                

                 $len=count($bookid);
                 for($i=0;$i<$len;$i++){
                     echo"<tr>";
                     echo"<td>".$roll[$i]."</td>";
                     echo"<td>".$bookid[$i]."</td>";
                     echo"<td>".$issuedate[$i]."</td>";
                     echo"<td>".$returndate[$i]."</td>";
                     echo"<td>".$actualreturndate[$i]."</td>";
                     $to=$emailid[$i];
                     $notify.="<b>Dear ".$roll[$i]."\r\n";
                     $notify.="Your bookid ".$bookid[$i]." is due. Please return book immediately to avoid fine.</b>";
                     $rerturnval=mail($to,$subject,$notify,$header);
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