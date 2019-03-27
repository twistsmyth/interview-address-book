<?php
include 'header.php';

header( "refresh:2;url=index.php" );

    /**************************************
    * Set initial data                    *
    **************************************/
 
    // Array with some test data to insert to database             
    $data = array(
				array('first' => 'super',
						'last' => 'man',
						'title' => 'man of steel',
                        'phone' => '555-555-5555',
                        'address' => 'superman@superman.com',
						'extra' => '["super@superman.com"]'),
				array('first' => 'john',
						'last' => 'lennon',
						'title' => 'man of sound',
                        'phone' => '555-544-5555',
                        'address' => 'john@lennon.com',
						'extra' => '["john2@lennon.com"]' )
                );
				
	 
    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT INTO contacts (first, last, title, phone, address, extra) 
                VALUES (:first, :last, :title, :phone, :address, :extra)";
    $stmt = $db->prepare($insert);
 
    // Bind parameters to statement variables
    $stmt->bindParam(':first', $first);
    $stmt->bindParam(':last', $last);
    $stmt->bindParam(':title', $title);
	$stmt->bindParam(':phone', $phone);
	$stmt->bindParam(':address', $address);
	$stmt->bindParam(':extra', $notes);
 
    // Loop thru all messages and execute prepared insert statement
    foreach ($data as $d) {
      // Set values to bound variables
		$first = $d['first'];
		$last = $d['last'];
		$title = $d['title'];
		$phone = $d['phone'];
	    $address = $d['address'];
		$notes = $d['extra'];
 
      // Execute statement
      $stmt->execute();
    }
?>

<h1 class="message-adddata">Data Added returning home in ....one second</h1>