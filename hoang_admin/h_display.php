<?php include 'database.php' ?>

<?php
$query = "SELECT * FROM sanpham"; //You don't need a ; like you do in SQL
$delete = "DELETE FROM sanpham WHERE id=3";
$result = mysqli_query($connect,$query);
echo "<table border='1'>";
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results

	echo "<tr>";

	echo '<td>' . $row['tensanpham'] . '</td>';

	echo '<td>' . $row['gia'] . '</td>';

	echo '<td><img height="100" width="100" src='.'"'.$row['hinhanh'].'"'.'></td>';

	echo '<td><a href="edit2.php?id=' . $row['id'] . '">Edit</a></td>';

	echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';

	echo "</tr>";


}
echo "</table>"; //Close the table in HTML
mysqli_close($connect); //Make sure to close out the database connection
?>
