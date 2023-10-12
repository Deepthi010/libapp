<?php
              session_start();
               if(empty($_SESSION))
                 {
                     header('location:../adminsigninform.php');
                 }
        ?>
<?php
 //fetch url param
 $catid=$_REQUEST['id'];
 $catname=urldecode($_REQUEST['name']);
 ?>
 <html>
     <head>
         <title>Edit category</title>
         
         <?php
           include("headerlink.php");
         ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
        include('header.php');
        ?>
        <div class="container">
            
        <div class="item">
            <h3> CATEGORY LIST</h3>
            <form method="POST" action="editcategory.php">
                <table class ="table">
                    <tr>
                        <td>Category id</td>
                        <td><input type="text" name="textcatid" value="<?php echo $catid; ?>" readonly/>
                        </td>
                        </tr>
                     <tr>
                        <td>Category name</td>
                        <td><input type="text" name="textcatname" value="<?php echo $catname; ?>" autofocus required />
                        </td>
                        </tr>
                     
                    <tr>
                       <td colspan="2"> <input type="submit" class="btn btn-primary" value='update'/>
                        </td>
                    </tr>
                </table>
                </form>
                </div>
        </div>
        <?php
        include('footer.php');
        ?>
      </body>
        </html>
        
     