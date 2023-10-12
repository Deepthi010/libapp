
<?php
            session_start();  
              if(empty($_SESSION))
                {
                    header('location:../adminsigninform.php');
                }
           ?>  

<?php
  $catid=$_REQUEST["catid"];
  
  ?>

<html>
    <head>
        <title>Add pdf</title>
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
                <h3>Add pdf</h3>
                <form method='POST' action="addpdf.php" enctype="multipart/form-data">
                    <table class="table">
                    <tr>
                        <td>Category id</td>
                        <td> <input type="text" name="textcatid" value="<?php echo $catid; ?>" readonly /></td>
                    </tr>
                        <tr>
                            <td>Pdf no</td>
                            <td> <input type="text" name="textisbn" required ></td>
                        </tr>
                        <tr>
                            <td>Bookname</td>
                            <td> <input type="text" name="textbookname" required="" /></td>
                        </tr>
                        <tr>
                           <td>Author</td>
                            <td> <input type="text" name="textauthor" required="" /></td>
                        </tr>
                        <tr>
                            <td>Book type</td>
                            <td> <input type="text" name="textbooktype" value="pdf" readonly /></td>
                        </tr>
                        
                        <tr>
                            <td>PDF</td>
                            <td> <input type="file" name="file2" id="file2" ></td>
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
                include("footer.php");
                ?>
      </body>
  </html>