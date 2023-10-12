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

$categoryid=array();
$isbn=array();
$categoryname=array();
$bookname=array();
$stock=array();
$price=array();
$author=array();
$imagename=array();
$booktype=array();
$pdffile=array();

$stmt=$conn->prepare("select book.categoryid,isbn,category,bookname,stock,price,author,image,booktype,pdf from book inner join category on 
book.categoryid=category.categoryid");
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    array_push($categoryid,$row["categoryid"]);
    array_push($isbn,$row["isbn"]);
    array_push($categoryname,$row["category"]);
    array_push($bookname,$row["bookname"]);
    array_push($stock,$row["stock"]);
    array_push($price,$row["price"]);
    array_push($author,$row["author"]);
    array_push($imagename,$row["image"]);
    array_push($booktype,$row["booktype"]);
    array_push($pdffile,$row["pdf"]);
}
$conn=null;
?>
<html>
    <head>
        <title> VIEW BOOK DETAILS</title>
        <?php
               include('headerlink.php');
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
               include('header.php');
               ?>
          <div align='center'>     
        <div class="container">
           
            <div class="item">
            
            <table class="table">
            <h3>BOOK LIST</h3>
            
                <tr>
                    <td>categoryid</td>
                    <td>isbn/pdf no</td>
                    <td>categoryname</td>
                    <td>bookname</td>
                    <td>stock</td>
                    <td>price</td>
                    <td>author</td>
                    <td>booktype</td>
                    <td>image/pdf</td>
                    <td>edit</td>
                    <td>add book</td>
            </tr>
                <?php
                $len=count($isbn);
                for($i=0;$i<$len;$i++){
                    echo"<tr>";
                    echo"<td>".$categoryid[$i]."</td>";
                    echo"<td>".$isbn[$i]."</td>";
                    echo"<td>".$categoryname[$i]."</td>";
                    echo"<td>".$bookname[$i]."</td>";
                    $name=urlencode($bookname[$i]);
                    echo"<td>".$stock[$i]."</td>";
                    echo"<td>".$price[$i]."</td>";
                    echo"<td>".$author[$i]."</td>";
                    $authorname=urlencode($author[$i]);
                    echo"<td>".$booktype[$i]."</td>";
                    if($booktype[$i]=="book"){
                     echo"<td><img src=".$imagename[$i]." height=100 width=100 /></td>";
                    }
                    else{
                    echo"<td><a href=viewpdf.php?pdffile=$pdffile[$i]>View PDF</a></td>";
                    }
                    
                    if($booktype[$i]=="book"){
                        echo "<td><a href=editbookform.php?isbn=$isbn[$i]&name=$name&price=$price[$i]&stock=$stock[$i]&author=$authorname>edit</a></td>";
                        echo "<td><a href=addbookdetailsform.php?isbn=$isbn[$i]>Add book</a></td>";
                    }
                    
                    echo"</tr>";
                }
                ?>
                
            </table>
        </div>
        </div>
        </div>       
        
     <?php
               include('footer.php');
               ?>
    </body>
</html>
