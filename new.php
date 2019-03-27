<?php
include 'header.php';
include 'database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$array = $_POST["extra"];
	$serialized = json_encode($array);
	$first = $_POST['first'];
    $last = $_POST['last'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
	$insert = "INSERT INTO contacts (first, last, title, phone, address, extra)
    VALUES ('$first','$last','$title','$phone','$address','$serialized')";
	$stmt = $db->prepare($insert);
	 $stmt->execute();
	 $id = $db->lastInsertId();

  header('Location: http://localhost:8080/cm-php/index.php?id=' . $id . '&created=true');
  }	
	  
?>
<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col col-lg-6 col-md-10">

  <!-- START OF ADD NEW CONTACT FORM -->
  <div class="container panel panel-default" id="presentation">
  <div class="row panel-heading"><h1>Create New Contact</h1></div>
<form method="post">
    <input type="hidden" name="id" id="id" value="<?= $contact['id']; ?>" />

  <div class="form-group">
    <label for="contact_first">First Name</label>
    <input class="form-control" type="text" name="first" id="first" placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="contact_last">Last Name</label>
    <input type="text" class="form-control" name="last" id="last" placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label for="contact_title">Title</label>
	 <p class="field">
    <input class="form-control" type="text" name="title" id="title" placeholder="Enter Phone Number">
  </div>
  <div class="form-group">
    <label for="contact_phone">Phone Number</label>
    <textarea class="form-control" name="phone" id="phone" placeholder="Enter Phone Number"></textarea>
  </div>
  <div class="form-group">
    <label for="contact_address">Email Address</label>
    <input class="form-control" type="text" name="address" id="address" placeholder="Enter Address">
  </div>
  <div class="form-group">
    <label for="contact_notes">Additional contact</label><input type="submit" style="float:right;" class="btn btn-primary" value="Add"/>
  <p class="field">
    <input class="form-control" type="text" name="extra[]" value="" /> 
  </p>
  </div>
  <p>
	<button class="btn btn-primary">Create</button>
  </p>
</form>
</div>
</div>
</div>
<div id="container-floating">
  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Back" onclick="location.href='index.php';">
<p class="plus"><</p>
    <i class="fa fa-chevron-left back" aria-hidden="true"></i>
  </div>
</div>
</div>
<?php
include 'footer.php';
?>