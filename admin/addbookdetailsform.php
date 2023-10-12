<?php
session_start();
//get category id
$isbn=$_REQUEST["isbn"];
?>
<html>
    <head>
    <?php
           include ('headerlink.php');
    ?> 
        <title>Add book </title>
         
    <link rel="stylesheet" href="styles.css"> 
       
    </head>
    <body>
    <?php
        include("header.php");
        ?>
        <div class="container">
             <div class="item">
                <h3>ADD BOOK</h3>
                <form method='POST' action="addbookdetails.php" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>isbn</td>
                            <td> <input type="text" name="textisbn" value="<?php echo $isbn; ?>" readonly ></td>
                        </tr>
                        <tr>
                            <td>Bookid</td>
                            <td> <input type="text" name="textbookid" required="" autofocus></td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                            <input type="submit" class="btn btn-primary" name="btn" value="Submit" /></td>
                        </tr>
                       
                    </table>
                </form>
            </div>
        </div>
        
        <?php
              
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
            ?>  
        <?php
        include("footer.php");
        ?>
      </body>
  </html>
