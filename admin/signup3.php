<?php
session_start();
include'connect/config.php'; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Verified ICO List</title>
<link href="signup_form.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="full">
  <div class="n1">
    <div class="n2">
      <div class="n3">Contact Details</div>
      <div class="n4">Account Information</div>
      <?php
	  if(isset($_POST['Next']))
	      {

		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$dob=$_POST['dob'];
		$curency=$_POST['curency'];
		
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['dob'] = $dob;
        $_SESSION['curency'] = $curency;

	 // echo $_SESSION['username'];
	  ?>
      
      <form class="n5" action="registration.php" method="post">
         <div class="n6">
           <div class="n6_text">Address</div>        <label for="textfield"></label>
         <input name="address" type="text" class="n6_text_field" id="textfield" />
         </div>
         <div class="n6">
           <div class="n6_text">City Name</div>        <label for="textfield"></label>
         <input name="city" type="text" placeholder="Type Your City Name" class="n6_text_field" id="textfield" />
         </div>
        <div class="n6">
           <div class="n6_text">Country Name</div>        <label for="textfield"></label>
         <input name="country" type="text" placeholder="Type your Country Name" class="n6_text_field" id="textfield" />
         </div>
        <div class="n6">
           <div class="n6_text">Posatal Code</div>        <label for="textfield"></label>
         <input name="postal_code" type="text" class="n6_text_field" id="textfield" />
         </div>
         <div class="n6">
           <div class="n6_text">State/Region</div>        <label for="textfield"></label>
         <input name="region" type="text" class="n6_text_field" id="textfield" />
         </div>
        <div class="n6">
           <div class="n6_text">Mobile No</div>        <label for="textfield"></label>
         <input name="mobile_no" type="text" placeholder="Type your Mobile No" class="n6_text_field" id="textfield" />
         </div>


         <div class="n6">
           <div class="n6_text">District</div>        <label for="textfield"></label>
         <select name="district" class="n6_text_field" required>
                                            <option value="">Select district</option>
                      <option value="Bagerhat">Bagerhat</option> 
                      <option value="Bandarban">Bandarban </option>
                      <option value="Barguna">Barguna </option>
                      <option value="Barisal">Barisal </option>
                      <option value="Bhola">Bhola </option>
                      <option value="Bogra">Bogra </option>
                      <option value="Brahmanbaria">Brahmanbaria </option>
                      <option value="Chandpur">Chandpur </option>
                      <option value="Chapainawabganj">Chapainawabganj </option>
                      <option value="Chittagong">Chittagong </option>
                      <option value="Chuadanga">Chuadanga </option>
                      <option value="Comilla">Comilla </option>
                      <option value="Cox's Bazar">Cox's Bazar </option>
                      <option value="Dhaka">Dhaka </option>
                      <option value="Dinajpur">Dinajpur </option>
                      <option value="Faridpur">Faridpur </option>
                      <option value="Feni">Feni </option>
                      <option value="Gaibandha">Gaibandha </option>
                      <option value="Gazipur">Gazipur </option>
                      <option value="Gopalganj">Gopalganj </option>
                      <option value="Habiganj">Habiganj </option>
                      <option value="Jamalpur">Jamalpur </option>
                      <option value="Jessore">Jessore </option>
                      <option value="Jhalokati">Jhalokati </option>
                      <option value="Jhenaidah">Jhenaidah </option>
                      <option value="Joypurhat">Joypurhat </option>
                      <option value="Khagrachhari">Khagrachhari </option>
                      <option value="Khulna">Khulna </option>
                      <option value="Kishoreganj">Kishoreganj </option>
                      <option value="Kurigram">Kurigram </option>
                      <option value="Kushtia">Kushtia </option>
                      <option value="Lakshmipur">Lakshmipur </option>
                      <option value="Lalmonirhat">Lalmonirhat </option>
                      <option value="Madaripur">Madaripur </option>
                      <option value="Magura">Magura </option>
                      <option value="Manikganj">Manikganj </option>
                      <option value="Meherpur">Meherpur </option>
                      <option value="Moulvibazar">Moulvibazar </option>
                      <option value="Munshiganj">Munshiganj </option>
                      <option value="Mymensingh">Mymensingh </option>
                      <option value="Naogaon">Naogaon </option>
                      <option value="Narail">Narail </option>
                      <option value="Narayanganj">Narayanganj </option>
                      <option value="Narsingdi">Narsingdi </option>
                      <option value="Natore">Natore </option>
                      <option value="Netrakona">Netrakona </option>
                      <option value="Nilphamari">Nilphamari </option>
                      <option value="Noakhali">Noakhali </option>
                      <option value="Pabna">Pabna </option>
                      <option value="Panchagarh">Panchagarh </option>
                      <option value="Patuakhali">Patuakhali </option>
                      <option value="Pirojpur">Pirojpur </option>
                      <option value="Rajbari">Rajbari </option>
                      <option value="Rajshahi">Rajshahi </option>
                      <option value="Rangamati">Rangamati </option>
                      <option value="Rangpur">Rangpur </option>
                      <option value="Satkhira">Satkhira </option>
                      <option value="Shariatpur">Shariatpur </option>
                      <option value="Sherpur">Sherpur </option>
                      <option value="Sirajganj">Sirajganj </option>
                      <option value="Sunamganj">Sunamganj </option>
                      <option value="Sylhet">Sylhet </option>
                      <option value="Tangail">Tangail </option>
                      <option value="Thakurgaon">Thakurgaon </option>
          </select>

         </div>
         <div class="n6">
           <div class="n6_text">Blood Group</div>        <label for="textfield"></label>
         <select name="blood_group" required>
                      <option value="">Select Blood Group</option>
                      <option value="A+">A+ </option> 
                      <option value="A-">A- </option>
                      <option value="B+">B+ </option>
                      <option value="B-">B- </option>
                      <option value="O+">O+ </option>
                      <option value="O-">O- </option>
                      <option value="AB+">AB+ </option>
                      <option value="AB-">AB- </option>
         </select>
         </div>
         <div class="n6">
           <div class="n6_text">Gender</div>        <label for="textfield"></label>
           <select name="gender" class="n6_text_field" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option> 
            </select>
         </div>


        <div class="n6">
           <div class="n6_text">I agree with terms and conditions</div>        <label for="textfield"></label>
         <input type="checkbox" name="agreement" required="required" />
                                  Accept 
         </div>        <div class="n6">
        </br><br>
</div>
        <div class="n7"><input type="submit" name="registration" class="n7_btn" value="Register" /></div>
      </form>
      	  <?php
		  }
          else
	     {
						 echo "<script language= 'JavaScript'>alert('Please Submit the Next Button');</script>";											

						 echo '<script> location.replace("signup2.php"); </script>';   		 
			 }	
		 ?>
      
    </div>
  </div>
</div>
</body>
</html>
