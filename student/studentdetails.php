<?php
  session_start();

  //get session emailid
  $email=$_SESSION["email"];
  $rollno=$_SESSION["rollno"];
  
  
  //fetch entire row of the student from database
   
   $studentname=null;
   $phone=null;
   $semester=null;
   
  try{
      //build the stmt to check
      $conn=new PDO("mysql:host=localhost;dbname=libdb","root",null);
      $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $stmt=$conn->prepare("select * from student where emailid=?");
      $stmt->bindParam(1,$email);
      $stmt->execute();
    
       //fetch customercode from row
       while($row=$stmt->fetch(PDO::FETCH_ASSOC)) 
       { 
           $studentname=$row["studentname"];
           $phone=$row["phone"];
           $semester=$row["semester"];
           $course=$row["course"];
       }
  }
    catch(Exception $e){
        $msg="Failed to fetch details, ".$e->getMessage();
    }
    
    if(empty($_SESSION))
    {
        header('location:../studentsigninform.php');
    }


    //in html display the values
 ?>
  <html>
    <head>
      <title>My Details</title>
      <?php
          include('headerlink.php');
      ?>

      <style>
          input,
          textarea{
              background-color: #D5D7DA ;
          }
          </style>
          <script>
        function validate(){
              var textphonepattern= /^[0-9]{10}$/;
              var phone=document.forms["regform"]["textphone"].value;
                if(phone.search(textphonepattern)==-1){
                    document.getElementById("phonemessage").innerHTML="Phone number should contain only digits";
                     return false;
                }
            var textnamepattern=/^[A-Za-z]+\s?[A-Za-z]+$/;
            var name=document.forms["regform"]["textstudentname"].value;
            if(name.search(textnamepattern)==-1){
                document.getElementById("namemessage").innerHTML="Name contains only alphabets with one space between each word";
                return false;
            }
            var textsempattern= /^[1-8]{1}$/;
              var phone=document.forms["regform"]["textsemester"].value;
                if(phone.search(textsempattern)==-1){
                    document.getElementById("semmessage").innerHTML="Semester should contain single digit";
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
           <form method="POST" action="studentupdatedetails.php" name="regform" onsubmit="return validate();">
        
          <table class="table">
          <tr>
                  <td>Rollno</td>
                  <td>
                      <input type="text" name="textrollno" id="textrollno" value="<?php echo $rollno;?>" readonly/>
                  </td>
              </tr>
              
              <tr>
                  <td>Student Name</td>
                  <td>
                      <input type="text" name="textstudentname" id="textstudentname" value="<?php echo $studentname;?>"maxlength="30" minlength="3" readonly/>
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
                          <input type="text" name="textphone" id="textphone" value="<?php echo $phone;?>" maxlength="10" minlength="10" readonly/>
                          <p id="phonemessage" style="color:tomato";></p>
                      </td>
                </tr>
                <tr>
                      <td>Course</td>
                      <td>
                          <input type="text" name="textcourse" id="textcourse" value="<?php echo $course;?>" readonly/>
                          
                      </td>
                      </tr>
                 <tr>
                      <td>Semester</td>
                    
                      <td>
                          <input type="text" name="textsemester" id="textsemester" value="<?php echo $semester;?>"maxlength="1" minlength="1" readonly/>
                          <p id="semmessage" style="color:tomato";></p>
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
                
                 document.getElementById("textstudentname").readOnly=false;
                 document.getElementById("textphone").readOnly=false;
                 document.getElementById("textsemester").readOnly=false;
                 document.getElementById("textcourse").readOnly=true;
                 
                 document.getElementById("textstudentname").style.backgroundColor="white";
                 document.getElementById("textphone").style.backgroundColor="white";
                 document.getElementById("textsemester").style.backgroundColor="white";
                 

                 document.getElementById("btnupdate").disabled=false;
                 document.getElementById("textstudentname").focus;
             }
      </script>
<?php
          include('footer.php');
        ?>      
    
    </body>
  </html>
