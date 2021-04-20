<?php
session_start();
if(isset($_SESSION['username'])){
  
}else{
  header("location:index.php");
}
include 'class/query.class.php';

$display = new Queryclass();
$show_result = $display->getallemployee();

if(isset($_POST['regbut1'])){
  $table1 = "employee";
	$fname1 = $_POST['fname']; 
	$lname1 = $_POST['lname']; 
	$mname1 = $_POST['mname']; 
	$bdate1 = $_POST['bdate']; 
  $jtitle1 = $_POST['jtitle']; 
	$bplace1 = $_POST['bplace']; 
	$mobile1 = $_POST['mobile']; 
	$email1 = $_POST['email']; 
  $cstatus1 = $_POST['status']; 
  $dhired1 = $_POST['dhired']; 
  $address1 = $_POST['address']; 
  $dcreated1 = date("Y/m/d");
	$image1 = $_POST['fileToUpload']; 
	$insert1 = $display->register($table1, $fname1, $lname1, $mname1, $bdate1,$bplace1, $jtitle1,  $email1, $mobile1, $cstatus1, $dhired1,
               $address1, $dcreated1, $image1);
                $name = $_FILES['fileToUpload']['name'];
               $target_dir = "./uploads/";
               $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
               $uploadOk = 1;
               $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
               
               // Check if image file is a actual image or fake image
               if(isset($_POST["regbut1"])) {
                 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                 if($check !== false) {
                   echo "File is an image - " . $check["mime"] . ".";
                   $uploadOk = 1;
                 } else {
                   echo "File is not an image.";
                   $uploadOk = 0;
                 }
               }
               
               // Check if file already exists
               if (file_exists($target_file)) {
                 echo "Sorry, file already exists.";
                 $uploadOk = 0;
               }
               
               // Check file size
               if ($_FILES["fileToUpload"]["size"] > 500000) {
                 echo "Sorry, your file is too large.";
                 $uploadOk = 0;
               }
               
               // Allow certain file formats
               if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
               && $imageFileType != "gif" ) {
                 echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                 $uploadOk = 0;
               }
               
               // Check if $uploadOk is set to 0 by an error
               if ($uploadOk == 0) {
                 echo "Sorry, your file was not uploaded.";
               // if everything is ok, try to upload file
               } else {
                 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$name)) {
                   echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                 } else {
                   echo "Sorry, there was an error uploading your file. / ". $target_dir . " / " . $name;
                 }
               }


}
if(isset($_POST['editbut'])){
  $idnum2 = $_POST['idnumber'];
	$fname2 = $_POST['fname']; 
	$lname2 = $_POST['lname']; 
	$mname2 = $_POST['mname']; 
	$bdate2 = $_POST['bdate']; 
  $jtitle2 = $_POST['jtitle']; 
	$bplace2 = $_POST['bplace']; 
	$mobile2 = $_POST['mobile']; 
	$email2 = $_POST['email']; 
  $cstatus2 = $_POST['status']; 
  $dhired2 = $_POST['dhired']; 
  $address2 = $_POST['address']; 
	$image2 = $_POST['fileToUpload']; 
 
  $display->editrecord($idnum2, $fname2, $lname2, $mname2, $bdate2, $bplace2, $jtitle2, $email2, $mobile2, $cstatus2, $address2, $dhired2,  $image2);
  
                       
       
}
if(isset($_POST['deletebut'])){
  $idnumber1 = $_POST['idnumber'];
 $display->deleterecord($idnumber1);
}
?>
<!DOCTYPE html>
<html>
<title>EMPLOYEE MASTER LIST</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.content{
	max-width: 80%;
	margin: auto;
	padding: 10px;
}	
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 10px;
  width:70%;
 
}
</style>
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Menu</h3>
  <button onclick="register()" class="w3-bar-item w3-button">New Employees</button>
  
</div>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-blue">
  <h1>Employee Master List</h1>
</div>

<div class="w3-container">
<table class="w3-table-all w3-hoverable" id="infotable">
    <thead>
      <tr class="w3-light-grey">
        <th>Name</th>
        <th>Job Title</th>
        <th>Email Address</th>
        <th>Mobile</th>
        <th>Date Hired</th>
        <th style="display:none"></th>
      </tr>
    </thead>
   
      <?php
      //print_r($show_result);
      Foreach($show_result as $shows){
      echo ' <tr onclick="view(this)">';

      echo '<td style="display:none">'. $shows['idnum'] .'</td>';
      echo '<td>'. $shows['fname'] . ' '.$shows['lname'].'</td>';
      echo '<td style="display:none">'. $shows['fname'].'</td>';
      echo '<td style="display:none">'. $shows['lname'].'</td>';
      echo '<td style="display:none">'. $shows['mname'].'</td>';
      echo '<td>'. $shows['jtitle'] .'</td>';
      echo '<td>'. $shows['email'] .'</td>';
      echo '<td>'. $shows['mobile'] .'</td>';
      echo '<td>'. $shows['dhired'] .'</td>';
      echo '<td style="display:none">'. $shows['bdate'] .'</td>';
      echo '<td style="display:none">'. $shows['bplace'] .'</td>';
      echo '<td style="display:none">'. $shows['cstatus'] .'</td>';
      echo '<td style="display:none">'. $shows['address'] .'</td>';
      echo '<td style="display:none">'. $shows['dcreated'] .'</td>';
      echo '<td style="display:none">'. $shows['image'] .'</td>';
      echo '</tr>';
    };
    ?>
  </table>
</div>
</div>


<div id="modal1" class="w3-modal w3-card-2 w3-animate-zoom">
	
						<form method="POST" action="home.php" class=" w3-card-2 content w3-white" enctype="multipart/form-data">
<table class=" w3-table " border="1" >
        <thead>
        <tr>
          <td colspan="4"><h1>Company Name</h1>
          <input style="visibility:hidden" value="<?php echo $_POST["idnumber"]; ?>" id="idnumber" name="idnumber">
          </td>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td colspan="4"><b>Information</b></td>
        </tr>
        <tr>
          <td style="width: 20%">Job title</td>
          <td style="width: 30%"><input value="<?php echo $_POST["jtitle"]; ?>" id="jtitle" name="jtitle" placeholder="Job title" class="w3-input w3-border"> </td>
          <td> Date Hired: <input type="date" name="dhired" value="<?php echo $_POST["dhired"]; ?>" ></td>
         
        </tr>
        <tr>
          <td>First Name</td>
          <td colspan="3"><input value="<?php echo $_POST["fname"]; ?>" id="fname" name="fname" placeholder="First Name" class="w3-input w3-border"></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td colspan="3"><input value="<?php echo $_POST["lname"]; ?>"  id="lname" name="lname" placeholder="Last Name" class="w3-input w3-border"> </td>
        </tr>
        <tr>
          <td>Middle Name</td>
          <td colspan="3"><input value="<?php echo $_POST["mname"]; ?>"  id="mname" name="mname" placeholder="Middle Name" class="w3-input w3-border"> </td>
         
        </tr>
        <tr>
          <td> Birthday</td>
          <td style="width: 30%"><input type="date" value="<?php echo $_POST["bdate"]; ?>" name="bdate" id="bdate"> </td>
          <td style="width: 20%" colspan="2">Birth Place : <input value="<?php echo $_POST["bplace"]; ?>"  id="bplace" name="bplace" placeholder="Birth Place" class="w3-input w3-border"> </td>
          
        </tr>
        <tr>
          <td>Cellphone No.</td>
          <td style="width: 30%"><input value="<?php echo $_POST["mobile"]; ?>"  id="mobile" name="mobile" placeholder="Mobile No." class="w3-input w3-border"></td>
          <td style="width: 20%" colspan="2">Email Address: <input value="<?php echo $_POST["email"]; ?>"  id="email" name="email" placeholder="Email Address" class="w3-input w3-border"> </td>
        </tr>
        <tr>
          <td>Civil Status</td>
          <td style="width: 30%" colspan="3">
          
         
            <input type="radio" id="Married" name="status" value="Married">
            <label for="Married">Married</label>
            <input type="radio" id="Single" name="status" value="Single">
            <label for="Single">Single</label>
            <input type="radio" id="Window" name="status" value="Widow">
            <label for="Window">Window</label>
            <input type="radio" id="Other" name="status" value="Other">
            <label for="Other">Other</label>
           
          </td>
          <tr>
          <td>Home Address</td>
          <td colspan="3"><input value="<?php echo $_POST["address"]; ?>"  id="address" name="address" placeholder="Home Address" class="w3-input w3-border"> </td>
        
        </tr>
        </tr>
        </tbody>

        </table>
							<button type="submit" class="w3-button w3-blue-gray w3-margin" id="regbut1" name="regbut1" value="Register">ADD</button>
              <button type="submit" class="w3-button w3-blue-gray w3-margin" style="visibility: hidden;" id="editbut" name="editbut" value="Edit">UPDATE</button>
              <button type="submit" class="w3-button w3-blue-gray w3-margin" style="visibility: hidden;" id="deletebut" name="deletebut" value="Delete">DELETE</button>
						</form>	
						
					</div>
 <script>
var image = document.getElementById('photo');
var modal = document.getElementById("modal1");
		function register(){
      document.getElementById("regbut1").style.visibility = "visible";
			document.getElementById("editbut").style.visibility = "hidden";
      document.getElementById("deletebut").style.visibility = "hidden";
			document.getElementById("modal1").style.display = "block";
		}
    function view(c){
      var x = c.rowIndex;
      var cstatus = document.getElementById("infotable").rows[x].cells[11].innerHTML;
			document.getElementById("modal1").style.display = "block";
      document.getElementById("editbut").style.visibility = "visible";
      document.getElementById("deletebut").style.visibility = "visible";
      document.getElementById("regbut1").style.visibility = "hidden";

      document.getElementById("idnumber").value = document.getElementById("infotable").rows[x].cells[0].innerHTML;
      document.getElementById("fname").value = document.getElementById("infotable").rows[x].cells[2].innerHTML;
      document.getElementById("lname").value = document.getElementById("infotable").rows[x].cells[3].innerHTML;
      document.getElementById("mname").value = document.getElementById("infotable").rows[x].cells[4].innerHTML;
      document.getElementById("jtitle").value = document.getElementById("infotable").rows[x].cells[5].innerHTML;
      document.getElementById("bdate").value = document.getElementById("infotable").rows[x].cells[9].innerHTML;
      document.getElementById("bplace").value = document.getElementById("infotable").rows[x].cells[10].innerHTML;
      document.getElementById("email").value = document.getElementById("infotable").rows[x].cells[6].innerHTML;
      document.getElementById("mobile").value = document.getElementById("infotable").rows[x].cells[7].innerHTML;
      document.getElementById("dhired").value = document.getElementById("infotable").rows[x].cells[8].innerHTML;
      document.getElementById(cstatus).checked="checked" 
      document.getElementById("address").value = document.getElementById("infotable").rows[x].cells[12].innerHTML;

		}
		window.onclick = function(event){
			if (event.target == modal){
				modal.style.display = "none";
			}
		}
    document.getElementById('fileToUpload').onchange = function (event) {
  	
   
	image.src = URL.createObjectURL(event.target.files[0]);

};


 </script>     
</body>
</html>
