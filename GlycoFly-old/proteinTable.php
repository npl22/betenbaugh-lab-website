<table cellspacing="0" cellpadding="0">
<tr>
<td width="145" bgcolor="#CCCCEE"><b><u>Acession Number</b></u></td>
<td width="230" bgcolor="#CCCCEE"><b><u>Protein Name</b></u></td>
<td width="150" bgcolor="#CCCCEE"><b><u>Annotation Symbol</b></u></td>

<td width="110" bgcolor="#CCCCEE"><b><u>Number of Observed Peptides</b></u></td>
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

$sql = "SELECT * FROM proteinDataFly ORDER BY ProteinID";

$result = mysql_query($sql);
$gray=0;
while ($fetchedRow = mysql_fetch_assoc($result)) {
	$ProteinID = $fetchedRow["ProteinID"];
	$Name = $fetchedRow["Name"];
	$AnnotationSymbol = $fetchedRow["AnnotationSymbol"];
	if ($gray == 1) {
		echo "<tr bgcolor=\"#CCCCCC\">";
		$gray = 0;
	}
	else { $gray = 1; }
	

	echo "<td><a href='protein.php?ID=".$ProteinID."'>".$ProteinID."</a></td>\r\n";
	echo "<td>".$Name."</td>\r\n";
	echo "<td>".$AnnotationSymbol."</td>\r\n";


	$sql2 = "SELECT * FROM `sequenceDataFly` WHERE `ReferenceID` = '$ProteinID' ";
	$result2 = mysql_query($sql2);
	$i = 0;
	while ($fetchedRow2 = mysql_fetch_assoc($result2)) {
		$i = $i + 1;
	}
	echo "<td>".$i."</td></tr>\r\n";
}
?>

</table>