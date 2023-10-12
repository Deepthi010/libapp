<?php
  session_start();

  //get session emailid
  $email=$_SESSION["email"];
  $facultyid=$_SESSION["facultyid"];
  //fetch entire row of the faculty from database
   
   $facultyname=null;
   $phone=null;
   
   
  try{
      //build the stmt to check
      $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $stmt=$conn->prepare("select * from faculty where emailid=?");
      $stmt->bindParam(1,$email);
      $stmt->execute();
    
       //fetch customercode from row
       while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
       { 
           $facultyname=$row["facultyname"];
           $phone=$row["phone"];
       }
  }
    catch(Exception $e){
        $msg="Failed to fetch details, ".$e->getMessage();
    }
    
    if(empty($_SESSION))
    {
        header('location:../facultysigninform.php');
    }


    //in html display the values
 ?>
  <html>
    <head>
      <title>My Details</title>
      <?php
          include('headerlink.php');
      ?>
      <link rel="stylesheet" href="styles.css">
      <style>
          input,
          textarea{
              background-color: #D5D7DA ;
          }
          </style>
          <script>
        function validate(){
              var textphonepattern= /^[0-9]{10}$/;
              var phone=document.forms["facregform"]["textphone"].value;
                if(phone.search(textphonepattern)==-1){
                    document.getElementById("phonemessage").innerHTML="Phone number should contain only digits";
                     return false;
                }
            var textnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var name=document.forms["facregform"]["textfacultyname"].value;
            if(name.search(textnamepattern)==-1){
                document.getElementById("namemessage").innerHTML="Name contains only alphabets with one space between each word";
                return false;
            }
        }
            </script>
    </head>
     <body>
     <?php
          include('header.php');
        ?>
          <div class="container">
            
          <div class="item">
              <h4>My info</h4>
              <button class="btn btn-primary" id="btn" onclick="enable()" >Edit</button>
           <form method="POST" action="facultyupdatedetails.php" name="facregform" onsubmit="return validate();">
        
          <table class="table">
          <tr>
                  <td>Faculty id</td>
                  <td>
                      <input type="text" name="textfacultyid" id="textfacultyid" value="<?php echo $facultyid;?>" readonly/>
                  </td>
              </tr>
              
              <tr>
                  <td>Faculty Name</td>
                  <td>
                      <input type="text" name="textfacultyname" id="textfacultyname" value="<?php echo $facultyname;?>" maxlength="30" minlength="3"
                       readonly/>
                      <p id="namemessage" style="color:tomato";></p>
                  </td>
              </tr>
              <tr>
                  <td>Email</td>
                  <td>
                      <input type="text" name="textemail" id="textemail" value="<?php echo $email;?>" readonly/> 
                  </td>
                  </tr>
                  <tr>
                      <td>Phone</td>
                      <td>
                          <input type="text" name="textphone" id="textphone" value="<?php echo $phone;?>" maxlength="10" minlength="10"readonly/>
                          <p id="phonemessage" style="color:tomato";></p>
                      </td>
                      </tr>
                      <tr>
                              <td colspan='2'><input type="submit" class="btn btn-primary" value="update changes" id="btnupdate" disabled>
                              </td>
                          </tr>
                 </table>
               </form>
            </div>
         </div>
         <script>
             function enable(){
                
                 document.getElementById("textfacultyname").readOnly=false;
                 document.getElementById("textphone").readOnly=false;

                 
                 document.getElementById("textfacultyname").style.backgroundColor="white";
                 document.getElementById("textphone").style.backgroundColor="white";
                 

                 document.getElementById("btnupdate").disabled=false;
                 document.getElementById("textfacultyname").focus;
             }
      </script>
      <?php
          include('footer.php');
        ?>
    
    </body>
  </html>
