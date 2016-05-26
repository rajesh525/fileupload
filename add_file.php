<?php
 include("connection.php");
$db = new Dbconnect(); 

// Check if a file has been uploaded
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database 
 
        // Gather all required data
        $name = $_FILES['uploaded_file']['name'];
        $mime = $_FILES['uploaded_file']['type'];
		$tmpName  = $_FILES['uploaded_file']['tmp_name'];

       // $data = file_get_contents($_FILES['uploaded_file']['tmp_name']);
        $size =$_FILES['uploaded_file']['size'];
          
        
$uploadDir = 'uploaddata/'; //Image Upload Folder

$filePath = $uploadDir .$name;
$re = move_uploaded_file($tmpName,$filePath);
if (!$re) {
echo "Error uploading file";
exit;
}		  
        // Create the SQL query
        $result = $db->putData($name,$mime,$size);
 
        // Execute the query
       // $result = mysql_query($query);
 
        // Check if it was successfull
        if($result) {
            echo 'Success! Your file was successfully added!';
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre></pre>";
        }
    }
    else {
        echo 'An error accured while the file was being uploaded. '
           . 'Error code: '. $_FILES['uploaded_file']['error'];
    }
 
    // Close the mysql connection
 
}
else {
    echo 'Error! A file was not sent!';
}
 
// Echo a link back to the main page
echo '<p>Click <a href="fileupload.php">here</a> to go back</p>';
?>