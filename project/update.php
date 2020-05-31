<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $id = $_GET['id'];
 $db = new Database();
 $query = "SELECT * FROM data WHERE id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['submit'])){
 $Name  = mysqli_real_escape_string($db->link, $_POST['Name']);
 $Roll  = mysqli_real_escape_string($db->link, $_POST['Roll']);
 $Department  = mysqli_real_escape_string($db->link, $_POST['Department']);
 $Email = mysqli_real_escape_string($db->link, $_POST['Email']);
 $Homecity = mysqli_real_escape_string($db->link, $_POST['Homecity']);
 if($Name == '' || $Roll == '' || $Department == '' || $Email == '' || $Homecity == ''){
  $error = "Field must not be Empty !!";
 } else {
  $query = "UPDATE data
  SET
  Name  = '$Name',
  Roll  = '$Roll',
  Department  = '$Department',
  Email = '$Email',
  Homecity = '$Homecity'
  WHERE id = $id";

  $update = $db->update($query);
 }
}
?>

<?php
if(isset($_POST['delete'])){
 $query = "DELETE FROM data WHERE id=$id";
 $deleteData = $db->delete($query);
}
?>
  

<?php 
if(isset($error)){
 echo "<span style='color:red'>".$error."</span>";
}
?>
<form action="update.php?id=<?php echo $id;?>" method="post">
<table>
 <tr>
  <td>Name</td>
  <td><input type="text" name="Name" 
  value="<?php echo $getData['Name'] ?>"/></td>
 </tr>
 <tr>
  <td>Roll</td>
  <td><input type="text" name="Roll" 
  value="<?php echo $getData['Roll'] ?>"/></td>
 </tr>
 <tr>
  <td>Department</td>
  <td><input type="text" name="Department" 
  value="<?php echo $getData['Department'] ?>"/></td>
 </tr>
 <tr>
  <td>Email</td>
  <td><input type="text" name="Email"
  value="<?php echo $getData['Email'] ?>"/></td>
 </tr>

 <tr>
  <td>Homecity</td>
  <td><input type="text" name="Homecity" 
  value="<?php echo $getData['Homecity'] ?>"/></td>
 </tr>
 <tr>
  <td></td>
  <td>
  <input type="submit" name="submit" value="Update"/>
  <input type="reset" Value="Cancel" />
  <input type="submit" name="delete" Value="Delete" />
  </td>
 </tr>

</table>
</form>
<a href="index.php">Go Back</a>
<?php include 'inc/footer.php'; ?>