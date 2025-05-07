<?php
	$dbhost = "localhost";
	$dbuser = "username";
	$dbpass = "password";
	$dbname = "dbname";
	
	$counts = (empty($_GET['n'])) ? 20 : $_GET['n'];
	
	
	$query = 'SELECT u.username, m.module_name, r.title, DATE_FORMAT(FROM_UNIXTIME(c.date), "%m/%d/%Y") AS date, c.message, CONCAT("https://www.mfgg.net/?act=resdb&param=02&c=",r.type,"&id=",c.rid) AS url ';
	$query .= 'FROM tsms_comments c ';
	$query .= 'JOIN tsms_users u ON c.uid = u.uid ';
	$query .= 'JOIN tsms_resources r ON c.rid = r.rid ';
	$query .= 'JOIN tsms_modules m ON r.type = m.mid ';
	$query .= 'ORDER BY c.date DESC ';
	$query .= 'LIMIT '.$counts;
	$output = '';
	$counter = 1;
	$ctable_row = 0;
	
	//add header
	$output .= "<h3>Recent {$counts} comments</h3><br><table border='0' cellpadding='0' cellspacing='0'>";
	
	//add styles
	$output .=
	'
		<style>
			body {
				font-family: verdana;
			}
			.VicePresident {
				overflow: hidden;
				-webkit-line-clamp: 1;
				width: 160px;
				display: block;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			td {
				padding: 8px;
				vertical-align: top;
			}
			tr {
				color: #000;
			}
			tr:hover {
				color: #FFF;
			}
			.trow0 {
				background-color: #EEE;
			}
			.trow1 {
				background-color: #DDD;
			}
			.trow0:hover, .trow1:hover {
				background-color: #999;
			}
			.quotetitle, .quote {
				background: rgba(0,0,0,0.5);
				color: #FFF;
				margin-left: 8px;
				margin-right: 8px;
				padding: 12px;
			}
		</style>
	';
	
	//add table header
	$output .= "
		<tr style='background: #333; color: #FFF;'>
			<td>#&nbsp&nbsp</td>
			<td>
				<span class='VicePresident'>Username</span>
			</td>
			<td>Section</td>
			<td>Submission</td>
			<td>Date</td>
			<td>Comment</td>
			<td>URL</td>
	";
	
	//establish MySQL connection
	$current_connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	
	//throw an error if connection failed
	if ($current_connection->connect_errno)
	{
		echo "Failed to connect to MySQL: (" . $current_connection->connect_errno . ") " . $current_connection->connect_error;
	}
	
	//perform the query
	if (mysqli_multi_query($current_connection,$query))
	{
		do
		{
			// Store first result set
			if ($result = mysqli_store_result($current_connection))
			{
				// Fetch one and one row
				while ($row = mysqli_fetch_row($result))
				{
					$temp = "ERROR";
					$temp_color = "#000";
					switch ($ctable_row)
					{
						case (0): $ctable_row = 1; break;
						case (1): $ctable_row = 0; break;
					}
					$output .= 
					"
						<tr class='trow".$ctable_row."' title='#".$counter."'>
							<td>".$counter."</td>
							<td>
								<span class='VicePresident'>".$row[0]."</span>
							</td>
							<td>".$row[1]."</td>
							<td>".$row[2]."</td>
							<td>".$row[3]."</td>
							<td>".$row[4]."</td>
							<td><a href='".$row[5]."'>View</a></td>
						</tr>
					";
					$counter += 1;
				}
				// Free result set
				mysqli_free_result($result);
			}
		}
		while (mysqli_next_result($current_connection));
	}
	
	mysqli_close();
	
	//closing
	$output .= "</table>";
	
	//display the output
	echo $output
?>