<?php
$a=rand();
$b=rand();
print <<<HERE
<form action="results.php?q=$a$b" method="post">
HERE;
?>
<br /><br />
<table cellspacing="0" cellpadding="0">
<tr valign="top">
	<td><strong>Search Text:</strong>&nbsp;&nbsp;</td>
    <td><input type="text" name="query" maxlength="256" width="200" /></td>
    <td width="20">&nbsp;</td>
    <td><select name="type">
			<option selected="selected">Bulk Search</option>
            <option>Sequence Search</option>
		</select>
    </td>
    <td width="20">&nbsp;</td>
    <td><input type="hidden" name="searchOn" value="yes" />
    <input type="submit" name="doit" /></td>
</tr>
</table>
</form>