<?php
	$dbhost = "localhost";
	$dbuser = "";
	$dbpass = "";
	$dbname = "";

	$query = 'SELECT u.username, r.title, DATE_FORMAT(FROM_UNIXTIME(r.created), "%Y") AS date, CONCAT("https://www.mfgg.net/?act=resdb&param=02&c=2&id=",r.rid) AS url, CONCAT("https://www.mfgg.net/preview/2/",g.preview) AS preview ';
    $query .= 'FROM tsms_res_games g ';
    $query .= 'JOIN tsms_resources r ON g.eid = r.eid ';
    $query .= 'JOIN tsms_users u ON r.uid = u.uid ';
    $query .= 'WHERE r.type = 2 ';
    $query .= 'ORDER BY RAND() ';
    $query .= 'LIMIT 1';
    
	$output = '';
	
	// Connect
	$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	
	// Throw an error on failure
	if (mysqli_connect_errno())
	{
		echo "ERROR: ".mysqli_connect_error();
	}
    
    $query_check = $mysqli->multi_query($query);

	// Let's f***ing go!!!!!
	if ($query_check)
	{
		do
		{
			// Store the first result set
			if ($result = $mysqli->store_result())
			{
				// Fetch
				while ($row = $result->fetch_row())
				{
					$output .= 
						$row[0]."||".
						$row[1]."||".
						$row[2]."||".
                        $row[3]."||".
                        $row[4];
				}
				// Free the result set
				$result->free();
			}
		}
		while ($mysqli->next_result());
    } 
    // More error displays
    else {
        if ($mysqli -> error)
        {
            echo "ERROR: " . $mysqli -> error;
        }
    }
	
	$mysqli->close();
	
	// Display the output
	echo $output
?>