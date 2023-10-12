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
$issuedate=$_REQUEST["issuedate"];
$actualreturndate=$_REQUEST["actualreturndate"];
$returndate=date('Y-m-d');

?>

<html>
    <head>
        <title>Return book</title>
    
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
                <h3>RETURN BOOK</h3>
                <form method='POST' action="facreturnbook.php">
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
                            <td>Return date</td>
                            <td> <input type="text" name="textreturndate" value="<?php echo $returndate; ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Additional fine</td>
                            <td> <input type="text" name="textadditionalfine" value="0" required></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <input type="submit" class="btn btn-primary" name="btn" value="Return" /></td>
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
