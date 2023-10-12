<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
        ?>

<?php
//fetch url param

$isbn=$_REQUEST["isbn"];
$bookid=$_REQUEST["bid"];
$status=$_REQUEST["status"];

?>
<html>
    <head>
        <title>Edit book details</title>
        <?php
          include("headerlink.php");
        ?>
        <link rel="stylesheet" href="styless.css">
    </head>
    <body>
        <?php
          include("header.php");
        ?>
    <div align="center">
            
            <form method="POST" action="editbookdetails.php">
                <h3>EDIT BOOK</h3>
            <table class='table'>
                <tr>
                    <td>isbn</tb>
                    <td>
                        <input type="text" name="textisbn" value=<?php echo $isbn;?> readonly/>
                    </td>
                </tr>
                <tr>
                    <td>Bookid</td>
                    <td>
                        <input type ="text" name="textbookid" value=<?php echo $bookid;?> readonly/>
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>
                        <input type ="text" name="textstatus" value=<?php echo $status;?> readonly/>
                    </td>
                </tr>
              
                <tr>
                    <td>Update Status</td>
                      <td>  <select name="textstatus">
                        <option>Available </option>
                        <option>NA </option>
                        <option>Deleted</option>
                    </select></td>
               
               </tr>
                   
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="UPDATE"/>
                    </td>
                </tr>
            </table>
        </form> 
        
        <?php
          include("footer.php");
        ?>
        </div>
    </body>
</html>