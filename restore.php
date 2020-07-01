<?php
    // display form if user has not clicked submit
    if (!isset($_POST["btn_submit"])) 
    {
?>

<!--This will be the form that will hold the information of the entire page.-->
<form enctype="multipart/form-data"class="elegant-aero" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <h1>Restore Database</h1>
    <p>
        <label>
            <span>Database File</span>
            <input type="file" name="backupFile" value="Upload File">
        </label>

        <!--Submit Button-->
        <label>
            <span>&nbsp;</span>
            <input type="submit" name="btn_submit" class="button" value="Add Scenario"/>
        </label>
    </p>
</form>

<?php

    } //end if

	if(isset($_FILES['backupFile']['error']) && UPLOAD_ERR_OK == $_FILES['backupFile']['error'])
        {
            //Format sql file
            $file = addslashes(file_get_contents($_FILES['backupFile']['tmp_name']));
        }
	
	
	import_tables("localhost","root","","textiledb",$file, true); 
	
	
    function import_tables($host,$user,$pass,$dbname,$sql_file,  $clear_or_not=false )
{
if (!file_exists($sql_file)) {
    die('Input the SQL filename correctly! <button onclick="window.history.back();">Click Back</button>');}

// Connect to MySQL server
    //$link = mysqli_connect($host,$user,$pass,$name);
    //mysqli_select_db($link,$mysqli);
$mysqli = new mysqli($host, $user, $pass, $dbname);
// Check connection
if (mysqli_connect_errno())   {   echo "Failed to connect to MySQL: " . mysqli_connect_error();   }

if($clear_or_not) 
{
    $zzzzzz = $mysqli->query('SET foreign_key_checks = 0');
    if ($result = $mysqli->query("SHOW TABLES"))
    {
        while($row = $result->fetch_array(MYSQLI_NUM))
        {
            $mysqli->query('DROP TABLE IF EXISTS '.$row[0]);
        }
    }
    $zzzzzz = $mysqli->query('SET foreign_key_checks = 1');
}

$mysqli->query("SET NAMES 'utf8'");
// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($sql_file);
// Loop through each line
foreach ($lines as $line)
{
    // Skip it if it's a comment
    if (substr($line, 0, 2) == '--' || $line == '')
        continue;
    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';')
    {
        // Perform the query
        $mysqli->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . $mysqli->error . '<br /><br />');
        // Reset temp variable to empty
        $templine = '';
    }
}
 echo 'Tables imported successfully. <button onclick="window.history.back();">Go Back</button>';
}
   

?>