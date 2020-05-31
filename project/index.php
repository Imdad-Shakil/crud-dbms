<?php 
include 'inc/header.php'; 
include "config.php";
include "Database.php";
?>

<?php 
 $db = new Database();
 $query = "SELECT * FROM data";
 $read = $db->select($query);
?>

<?php 
if(isset($_GET['msg'])){
 echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>

<table class="tblone">
<tr>
 <th width="5%">Serial</th>
 <th width="70%">Name</th>
 <th width="15%">Roll</th>
 <th width="10%">Department</th>
 <th width="20%">Email</th>
 <th width="10%">Homecity</th>
 <th width="15%">Action</th>
</tr>
<?php if($read){?>
<?php 
$i=1;
while($row = $read->fetch_assoc()){
?>
<tr>
 <td><?php echo $i++ ?></td>
 <td><?php echo $row['Name']; ?></td>
 <td><?php echo $row['Roll']; ?></td>
 <td><?php echo $row['Department']; ?></td>
  <td><?php echo $row['Email']; ?></td>
   <td><?php echo $row['Homecity']; ?></td>
 <td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">
  Update/Delete</a></td>
</tr>


<?php } ?>
<?php } else { ?>
<p>Data is not available !!</p>
<?php } ?>
</table>
<a href="create.php">Insert New Data</a>
<?php include 'inc/footer.php'; ?>