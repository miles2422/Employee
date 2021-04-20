<?php
include 'connect.class.php';
class Queryclass extends Dbh{
  

    public function getallemployee(){
       
		$sql = "Select * from employee";
        $result = $this->connect()->query($sql);
        $num = $result->num_rows;
       
        if($num > 0){
             while($row = $result->fetch_assoc()){
                    $data[] = $row;
             }
             return $data;

        }

	}

    public function register($table, $fname, $lname, $mname, $bdate, $bplace, $jtitle, $email, $mobile, $cstatus, $dhired,
    $address, $dcreated, $image){
       

        $sql = "INSERT INTO `employee` (`idnum`, `fname`, `lname`, `mname`, `bdate`, `bplace`, `jtitle`, `email`, `mobile`, `cstatus`, `address`, `dhired`, `dcreated`, `image`) VALUES 
        (NULL, '".$fname."', '".$lname."', '".$mname."', '".$bdate."', '".$bplace."', '".$jtitle."', '".$email."', '".$mobile."', '".$cstatus."', '".$address."', '".$dhired."', '".$dcreated."', '".$image."');";
       
        if ($this->connect()->query($sql) === TRUE) {
            echo "<script>alert('New employee added!');</script>";  
            mkdir("data/attachments", $name);
          } else {
            echo "<script>alert('Error: " . $sql . "<br>" . $conn->error .")</script>";
          }
    }

    public function login($username, $password){
            $sql = "Select * from user where username='".$username."' and password='".$password."'";
            $result = $this->connect()->query($sql);
            $num = $result->num_rows;
            if ( $num > 0 ){
                header("Location: home.php");  
            }
    }

    public function editrecord($idnum22, $fname22, $lname22, $mname22, $bdate22, $bplace22, $jtitle22, $email22, $mobile22, $cstatus22, $address22, $dhired22,  $image22){
        
        $sql = "UPDATE `employee` SET `fname` = '".$fname22."', `lname` = '".$lname22."', `mname` = '".$mname22."', `bdate` = '".$bdate22."',
         `bplace` = '".$bplace22."', `jtitle` = '".$jtitle22."', `email` = '".$email22."', `mobile` = '".$mobile22."', `cstatus` = '".$cstatus22."',
          `address` = '".$address22."', `dhired` = '".$dhired22."', `image` = '".$image22."' WHERE idnum = '".$idnum22."';";
      
      
      if ($this->connect()->query($sql) === TRUE) {
          echo "<script>alert('Record updated successfully');</script>"; 
      }else{
          echo "Updated failed try again! ";
      }
      
    }

    public function deleterecord($idnumber){
       
        $sql = "DELETE from employee WHERE idnum='".$idnumber."'";
        if ($this->connect()->query($sql) === TRUE) {
            echo "<script>alert('Record deleted successfully '".$idnumber.");</script>"; 
          } else {
            echo "Error deleting record: " .$this->connect()->error;
          }
          
    }
}