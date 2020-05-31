<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $db = new Database();
if(isset($_POST['submit'])){
 $Name  = mysqli_real_escape_string($db->link, $_POST['Name']);
 $Roll  = mysqli_real_escape_string($db->link, $_POST['Roll']);
 $Department  = mysqli_real_escape_string($db->link, $_POST['Department']);
 $Email = mysqli_real_escape_string($db->link, $_POST['Email']);
 $Homecity = mysqli_real_escape_string($db->link, $_POST['Homecity']);
 if($Name == '' || $Roll == '' || $Department == '' || $Email == '' || $Homecity == ''){
  $error = "This form must not be Empty !!";
 } else {
  $query = "INSERT INTO data(Name,Roll,Department, Email, Homecity) 
   Values('$Name','$Roll','$Department', '$Email', '$Homecity')";
  $create = $db->insert($query);
 }
}
?>

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="create.php" method="post">
<table>
 <tr>
  <td>Name</td>
  <td><input type="text" name="Name" placeholder="Please enter 
   Name"/></td>
 </tr>
 <tr>
  <td>Roll</td>
  <td><input type="text" name="Roll" placeholder="Please enter 
   Roll"/></td>
 </tr>
 <tr>
  <td>Department</td>
  <td><input type="text" name="Department" placeholder="Please enter 
   Department"/></td>
 </tr>
 <tr>
  <td>Email</td>
  <td><input type="text" name="Email" placeholder="Please enter 
   Email"/></td>
 </tr>

 <tr>
  <td>Homecity</td>
  <td><input type="text" name="Homecity" placeholder="Please enter 
  Homecity"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Submit"/>
  <input type="reset" Value="Cancel" />
  </td>
 </tr>

</table>
</form>
<a href="index.php">Back Homepage</a>
<?php include 'inc/footer.php'; ?>