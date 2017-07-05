<table cellspacing="0" cellpadding="0">
<tr>
<td bgcolor="#000"><b>Accession Number</b></td>
<td bgcolor="#000"><b>Protein Name</b></td>
<td bgcolor="#000"><b>Number of Observed Peptides</b></td>
</tr>

<?php
///////////////////////////// PHP CODE BEGINS HERE /////////////////////////////////////////////////////<?

///////////////////////////////////////////////////////////////////////////////////////
// CONNECT TO THE DATABASE
///////////////////////////////////////////////////////////////////////////////////////

$conn = mysql_connect("mysql.betenbaugh.dreamhosters.com", "betenbaugh", "neb039");
mysql_select_db("betenbaugh", $conn);

///////////////////////////////////////////////////////////////////////////////////////
// FETCH DATA FROM DATABASE
///////////////////////////////////////////////////////////////////////////////////////

$sql = "SELECT * FROM proteinDataFish ORDER BY ProteinID";

$result = mysql_query($sql);
while ($fetchedRow = mysql_fetch_assoc($result)) {
	$ProteinID = $fetchedRow["ProteinID"];
	$Name = $fetchedRow["Name"];

	echo "<td><a href='protein.php?ID=".$ProteinID."'>".$ProteinID."</a></td>\r\n";
	echo "<td>".$Name."</td>\r\n";

	$sql2 = "SELECT * FROM `sequenceDataFish` WHERE `ReferenceID` = '$ProteinID' ";
	$result2 = mysql_query($sql2);
	$i = 0;
	while ($fetchedRow2 = mysql_fetch_assoc($result2)) {
		$i = $i + 1;
	}
	echo "<td>".$i."</td></tr>\r\n";
}
?>

</table>

