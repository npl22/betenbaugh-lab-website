<?php
///////////////////////////// PHP CODE BEGINS HERE /////////////////////////////////////////////////////<?

$ProteinID = $_GET["ID"];

///////////////////////////////////////////////////////////////////////////////////////
// CONNECT TO THE DATABASE
///////////////////////////////////////////////////////////////////////////////////////

$conn = mysql_connect("mysql.betenbaugh.dreamhosters.com", "betenbaugh", "neb039");
mysql_select_db("betenbaugh", $conn);

///////////////////////////////////////////////////////////////////////////////////////
// FETCH DATA FROM DATABASE
///////////////////////////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `proteinDataFly` WHERE `Name` = '$ProteinID'";
$result = mysql_query($sql);
while ($fetchedRow = mysql_fetch_assoc($result)) {
	$ProteinID = $fetchedRow["ProteinID"];
	$Name = $fetchedRow["Name"];
	$AnnotationSymbol = $fetchedRow["AnnotationSymbol"];
	$ProteinSymbol = $fetchedRow["ProteinSymbol"];
	$ProteinFunction = $fetchedRow["ProteinFunction"];
	$ProteinSummary = $fetchedRow["ProteinSummary"];
	$Sequence = $fetchedRow["Sequence"];
}

print <<<HERE
<h1><i>N</i>-Glycosylated Protein Data</h1>
<h2>Protein Summary</h2>
<table cellpadding="0" cellspacing="0">
<tbody><tr>
          <td bgcolor="#cccccc" width="140"><strong>ID:</strong></td>
          <td width="11"></td>

          <td width="363">$ProteinID</td>
        </tr>
        <tr>
          <td bgcolor="#cccccc"><strong>Protein name:</strong></td>
          <td></td>
          <td>$Name</td>
        </tr>

        <tr>
          <td bgcolor="#cccccc"><strong>Protein Symbol:</strong></td>
          <td></td>
          <td>$ProteinSymbol</td>
        </tr>
        <tr>
          <td bgcolor="#cccccc"><strong>Protein Function:</strong></td>

          <td></td>
          <td>$ProteinFunction</td>
        </tr>
        <tr>
          <td bgcolor="#cccccc"><strong>Annotation Symbol:</strong></td>
          <td></td>
          <td>$AnnotationSymbol</td>

        </tr>
      </tbody>
</table>
<h2>Identified <em>N</em>-Linked Glyco-Peptides</h2>
      <table style="width: 800px;" cellpadding="0" cellspacing="0">
        <tbody><tr bgcolor="#cccccc">
          <td width="63"><strong>NXS/T    Location</strong></td>
          <td width="180"><strong>Identified Sequence</strong></td>
          <td width="85"><strong>Enzyme Used</strong></td>
          <td width="75"><strong>Observed Mass</strong></td>
          <td width="75"><strong>Predicted Mass</strong></td>
          <td width="60"><strong>Charge&nbsp;</strong></td>
          <td width="78"><strong>Probability</strong></td>
          <td width="65"><strong>Mascot<br>Ion Score</strong></td>
          <td width="65"><strong>Mascot Identity Score</strong></td>
	 </tr>
HERE;

$sql = "SELECT * FROM `sequenceDataFly` WHERE `ReferenceID` = '$ProteinID' ORDER BY Location";
$result = mysql_query($sql);

while ($fetchedRow = mysql_fetch_assoc($result)) {
	$Location = $fetchedRow["Location"];
	$IDSequence = $fetchedRow["IDSequence"];
	$Enzyme = $fetchedRow["Enzyme"];
	$ObsMass = $fetchedRow["ObsMass"];
	$PreMass = $fetchedRow["PreMass"];
	$Charge = $fetchedRow["Charge"];
	$Probability = $fetchedRow["Probability"];
	$IonScore = $fetchedRow["IonScore"];
	$IdentScore = $fetchedRow["IdentScore"];

	echo "<tr>\r\n";
	echo "<td>".$Location."</td>\r\n";
	
	$FormattedSequence = str_replace("[", "<font style=\"background-color:rgb(255, 255, 0);\">", $IDSequence);
	$FormattedSequence1 = str_replace("]", "</font>", $FormattedSequence);

	echo "<td>".$FormattedSequence1 ."</td>\r\n";
	echo "<td>".$Enzyme."</td>\r\n";
	echo "<td>".$ObsMass."</td>\r\n";
	echo "<td>".$PreMass."</td>\r\n";
	echo "<td>".$Charge."</td>\r\n";
	echo "<td>".$Probability."</td>\r\n";
	echo "<td>".$IonScore."</td>\r\n";
	echo "<td>".$IdentScore."</td>\r\n";
	echo "</tr>";
}
echo "</tbody></table>";
?>
<h2>Protein Sequence</h2>

<?php
$seq = $Sequence;
$count = strlen($seq);
$i = 0;
$j = 1;
$lookCaps = TRUE;
$strings = "";
while($i < $count)
{
        $char = $seq{$i};
		if($lookCaps == TRUE){
			if(ereg("\[", $seq{$i-1}, $val)){
					$strings .= $char."<font style=\"background-color:rgb(255, 255, 0);\">";
					$lookCaps = FALSE;
			} else {
					$strings .= $char;
			}
		}
		else {
			if(ereg("\]", $seq{$i+1}, $val)){
					$strings .= "</font>".$char;
					$lookCaps = TRUE;
			} else {
					$strings .= $char;
			}
		}
		if($j==60) {
			$strings .= "<br>\r\n";
			$j=0;
		}
		$j++;
$i++;
}

echo "<p><font face=\"Courier New\" style=\"font-size: 10pt;\">".$strings."</font></p>";

echo "<p><b>Legend:</b> &nbsp;[<font face=\"Courier New\" style=\"background-color:rgb(255, 255, 0);\">abcdef</font>] - indicates identified peptide</p>";
?>