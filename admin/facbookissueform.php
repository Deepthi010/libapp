<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
?> 

<?php
$facultyid=$_REQUEST["facid"];
$bookid=$_REQUEST["bookid"];
$issuedate=date('Y/m/d');
$actualreturndate=date('Y/m/d');
?>
<?php
  
   $actualreturndate= date("Y/m/d",strtotime($issuedate. '+155 days'));
?>
<html>
    <head>
        <title>Issue book</title>
    
    <link rel="stylesheet" href="styles.css"> 
    <?php
      include ('headerlink.php');
    ?>       
    </head>
    <body>
    <?php
                include("header.php");
                ?>
        <div class="container">
            
            <div class="item">
                <h3>ISSUE BOOK</h3>
                <form method='POST' action="facbookissue.php" enctype="multipart/form-data">
                    <table class="table">
                        <tr>
                            <td>Facultyid</td>
                            <td> <input type="text" name="textfacid" value="<?php echo $facultyid; ?>" readonly ></td>
                        </tr>
                        <tr>
                            <td>Bookid</td>
                            <td> <input type="text" name="textbookid" value="<?php echo $bookid; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Issue date</td>
                            <td> <input type="text" name="textissuedate" value="<?php echo $issuedate; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Actual return date</td>
                            <td> <input type="text" name="textactualreturndate" value="<?php echo $actualreturndate; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" class="btn btn-primary" name="btn" value="Issue" /></td>
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
