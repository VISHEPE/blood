<?php
$name=$_POST['fullname'];
$number=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blood_group=$_POST['blood'];
$address=$_POST['address'];
$donation_date= $_POST['donation_date'];
$conn=mysqli_connect("localhost","root","","bloodbank") or die("Connection error");
$sql= "INSERT INTO donor_details(donor_name,donor_number,donor_mail,donor_age,donor_gender,donor_blood,donor_address,donation_date) values('{$name}','{$number}','{$email}','{$age}','{$gender}','{$blood_group}','{$address}','{$donation_date}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");



mysqli_close($conn);
echo "<script>
    alert('Thank you for donating blood! Your details have been successfully recorded.');
    window.location.href = 'donate_blood.php';
</script>";
 ?>
