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
$bookname=urldecode($_REQUEST["name"]);
$stock=$_REQUEST["stock"];
$price=$_REQUEST["price"];
$author=urldecode($_REQUEST["author"]);
?>
<html>
    <head>
        <title>Edit book</title>
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
      
            <form method="POST" action="editbook.php">
                <h3>EDIT BOOK</h3>
            <table>
                <tr>
                    <td>isbn</tb>
                    <td>
                        <input type="text" name="textisbn" value=<?php echo $isbn;?> readonly/>
                    </td>
                </tr>
                <tr>
                    <td>Edit book name</td>
                    <td>
                        <input type ="text" name="textbookname" value="<?php echo $bookname;?>" autofocus required/>
                    </td>
                </tr>
                <tr>
                    <td>Author</td>
                    <td>
                        <input type ="text" name="textauthor" value="<?php echo $author;?>"  required/>
                    </td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td>
                        <input type ="text" name="textstock" value="<?php echo $stock;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type ="text" name="textprice" value="<?php echo $price;?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td>New price</td>
                    <td>
                        <input type ="text" name="textnewprice" value="<?php echo $price;?>" required/>
                    </td>
                </tr>
                <tr>
                    <td>New stock</td>
                    <td>
                        <input type ="text" name="textnewstock" value="0"  required />
                    </td>
                </tr>
                
                    
                   
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn btn-primary" value="UPDATE"/>
                    </td>
                </tr>
            </table>
        </form> 
        
  </div>
  <?php
          include("footer.php");
        ?>
    </body>
</html>