<?php
     session_start();

        if(empty($_SESSION))
            {
              header('location:../facultysigninform.php');
            }
?>

<?php
//get parameter values

$isbn=$_REQUEST["isbn"];
$_SESSION["isbn"]=$isbn;
$facultyid=$_SESSION["facultyid"];
$bookname=urldecode($_REQUEST["name"]);
$authorname=urldecode($_REQUEST["auname"]);
$reservedate=date('Y/m/d');
$bookidarray=array();
$msg=null;
$conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

try{
    //build the stmt to check
    $stmt=$conn->prepare("select bookid from bookdetails where isbn=? and status ='Available'");
    $stmt->bindParam(1,$isbn);
    $stmt->execute();
    $c=$stmt->rowCount();
    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($bookidarray,$row["bookid"]);
    }

$arraylength=count($bookidarray);
}catch(Exception $e){
    $msg="Failed to reserve the book,retry...".$e->getMessage();

}
finally{
    echo $msg;
}



?>
<html>
    <head>
        <title>Reserve Book</title>
        <?php
           include("headerlink.php");
        ?>
        <link rel="stylesheet" href="styless.css"/>
        
    </head>
    
    <body>
    <?php
                include('header.php');
                ?>
        <div class="container">
            
            <div class="item">
            <?php
                    if($arraylength>0)
                    {
            ?>
                <h3>Reserve Book</h3>
                    <form method="POST" action="reservebook.php">
                             <table class="table">
                                <tr>
                                     <td>Faculty id</td>
                                     <td><input type="text" name="textfacid" value="<?php echo $facultyid;?>" readonly/></td>
                                </tr>
                                <tr>
                                     <td>Select book id</td>
                                     <td><select name="textbookid">
                                    <?php
                                     for($i=0; $i<$arraylength; $i++){
                                        ?>
                                        <option><?php echo $bookidarray[$i]; ?></option>
                                        <?php }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                     <td>Bookname</td>
                                     <td><input type="text" name="textbookname" value="<?php echo $bookname;?>" readonly></td>
                                 </tr>
                                 <tr>
                                     <td>Author</td>
                                     <td><input type="text" name="textauthorname" value="<?php echo $authorname;?>" readonly/></td>
                                 </tr>
                                 <tr>
                                     <td>Book reserve date</td>
                                     <td><input type="text" name="textreservedate" value="<?php echo $reservedate;?>" readonly/></td>
                                 </tr>
                                 <tr>
                                     <td><input type="submit" class="btn btn-primary" value="Reserve book"/></td>
                                 </tr>
                             </table>
                    </form>
            </div>                 
            <?php
                    }
                    else{
                        $msg="No books available to reserve";
                    }
            ?>
            <?php
            echo $msg;
            ?>
        </div>
        <?php
                include('footer.php');
                ?>
    </body>
</html>
