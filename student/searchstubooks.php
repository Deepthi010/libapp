<?php
 session_start();
 $_SESSION["searchtype"]="search";
 ?>
 <html>
    <head>
        <title>Book search</title>
        <?php
          include("headerlink.php");
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <?php
                include('header.php');
                ?>
        <div class="item">
         <h3>Search</h3>
         <form method="POST" action="browsestubooks.php">
            <table class="table">
                <tr>
                    <td>Type of book</td>
                    <td><input type="text" name="textcategoryname"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="btn btn-primary" value="Search"/></td>
                </tr>
            </table>
         </form>
        </div>
        <?php
         if(empty($_SESSION))
            {
              header('location:../studentsigninform.php');
            }
       ?>
       <?php
                include('footer.php');
                ?>
    </body>
 </html>