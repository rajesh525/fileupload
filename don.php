<?php 

	include("connection.php");
	$db= new DbConnect();
	$data = $db->getData();
	
	while($result = mysqli_fetch_array($data)){

			$name=$result['name'];
			$created_at=$result['created_at'];

            ?>

            <?php 

	        echo $created_at; ?>:
	        <?php echo $name;?> 
	       <a href="download.php?f=<?php echo $name;?>">download</a> <br>
           <?php 
    }

?>