<?php
session_start();
//get category id
$catid=$_REQUEST["catid"];
?>
<html>
    <head>
        <title>Add book info</title>
    <?php
      include ('headerlink.php');
    ?> 
    <link rel="stylesheet" href="styles.css">       
    </head>
    <body>
         <?php
                include("header.php");
                ?>
        <div class="container">
             <div class="item">
                <h3>ADD BOOK</h3>
                <form method='POST' action="addbook.php" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Category id</td>
                            <td> <input type="text" name="textcatid" value="<?php echo $catid; ?>" readonly ></td>
                        </tr>
                        <tr>
                            <td>isbn</td>
                            <td> <input type="text" name="textisbn" required="" autofocus></td>
                        </tr>
                        <tr>
                            <td>Bookname</td>
                            <td> <input type="text" name="textbookname" required="" /></td>
                        </tr>
                        <tr>
                            <td>Stock</td>
                            <td> <input type="number" name="textstock" required="" /></td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td> <input type="number" name="textprice" required="" /></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td> <input type="text" name="textauthor" required="" /></td>
                        </tr>
                    <tr>
                        <td>Book type</td>
                        <td> <input type="text" name="textbooktype" value="book" readonly /></td>
                    </tr>
                        
                        <tr>
                            <td>Image</td>
                            <td> <input type="file" name="file1" id="file1" ></td>
                        </tr>
                        <tr>
                        
                        <tr>
                            <td colspan="2">
                            <input type="submit" class="btn btn-primary"name="btn" value="Submit" /></td>
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
