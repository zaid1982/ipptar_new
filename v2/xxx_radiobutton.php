<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="test"; // Database name
$tbl_name="coba"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

if(isset($_POST["submit"]) && $_POST["submit"]!="") {
	
    $item_idCount = $_POST["i"];
    
    for($i=1; $i<$item_idCount; $i++) {
        
        $sql = "UPDATE coba set fname='" . $_POST["fname"][$i] . "', lname='" . $_POST["lname"][$i] . "' WHERE id ='" . $_POST["id"][$i] . "'";
        $result = mysql_query( $sql );
        
    }
    #header("Location:index.php");
}

?>
<form id="frm_update" name="frm_update"  method= "post" action=""> 
    <table width="30%" border="0" align="center"> 
   	 	<th>id</th>
        <th> fname </th>
        <th> lname </th>
        <tr> 
        <?php 
        $sql= mysql_query("SELECT * FROM `coba`");
        $i=1;
        while($row= mysql_fetch_array($sql)){
            $fname      =   $row['fname'];
            $lname    =   $row['lname'];
        ?>
        	<td><?php print $i; ?>&nbsp;<input type="text" name="id[<?php print $i; ?>]" value="<?php echo $row['id'];?>" size="5"/></td>
            <td><input type="radio" name="fname[<?php print $i; ?>]" id="fname" value="1" <?php if($row['fname']=="1") {echo "checked";}else{}?>><input type="radio" name="fname[<?php print $i; ?>]" id="fname" value="2" <?php if($row['fname']=="2") {echo "checked";}else{}?>></td>
            <td><input type="radio" name="lname[<?php print $i; ?>]" id="lname" value="1" <?php if($row['lname']=="1") {echo "checked";}else{}?>><input type="radio" name="lname[<?php print $i; ?>]" id="lname" value="2" <?php if($row['lname']=="2") {echo "checked";}else{}?>></td>
            
        </tr>   
        <?php $i++; }?>
        <tr><td><input type="text" name="i" value="<?php echo $i;?>" size="5"/><input type='submit' name='submit' Value='Update' class="updateBtn"/></td></tr>
    </table> 
    
    <div style="clear:both"> </div>
</form>