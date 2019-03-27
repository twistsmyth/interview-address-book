<?php
  include 'header.php';
  $id = $_GET['id'];

  $stmt = $db->prepare('SELECT * from contacts WHERE id = :id LIMIT 1');
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $contact = $stmt->fetch(PDO::FETCH_ASSOC);
  $des = json_decode($contact['extra']);
  foreach ($des as &$value) {

  print_r($value."</br>");
}
 

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

	$array = $_POST["extra"];
	$serialized = json_encode($array);
	$id = $_POST['id'];
	$first = $_POST['first'];
    $last = $_POST['last'];
    $title = $_POST['title'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
	$update= "UPDATE contacts SET first = '$first', last = '$last', title = '$title', phone = '$phone', address = '$address', extra = '$serialized' WHERE id = '$id'";
	$insert = "INSERT INTO contacts (first, last, title, phone, address, extra)
    VALUES ('$first','$last','$title','$phone','$address','$serialized')";
	$stmt = $db->prepare($update);
	 $stmt->execute();
	 $id = $db->lastInsertId();

	//print_r($serialized); 
  header('Location: http://localhost:8080/cm-php/index.php?updated=true');
  }	
  
 ?>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="col col-lg-6 col-md-10">


<!-- START OF EDIT CONTACT FORM -->
<div class="container panel panel-default" id="presentation">
  <div class="row panel-heading">
    <h1>Edit Contact</h1>
  </div>
<form method="POST">
  <input type="hidden" name="id" id="contact_id" value="<?= $contact['id']; ?>" />

  <div class="form-group">
    <label for="contact_first">First Name</label>
    <input class="form-control" type="text" name="first" id="first" value="<?= $contact['first']; ?>" />
  </div>

  <div class="form-group">
    <label for="contact_last">Last Name</label>
    <input class="form-control" type="text" name="last" id="last" value="<?= $contact['last']; ?>" />
  </div>

  <div class="form-group">
    <label for="contact_title">Title</label>
    <input class="form-control" type="text" name="title" id="title" value="<?= $contact['title']; ?>" />
  </div>

  <div class="form-group">
    <label for="contact_phone">Phone Number</label>
    <textarea class="form-control" name="phone" id="phone"><?= $contact['phone']; ?></textarea>
  </div>

  <div class="form-group">
    <label for="contact_address">Email Address</label>
    <input class="form-control" type="text" name="address" id="address" value="<?= $contact['address']; ?>" />
  </div>
  
  <div class="form-group">
    <label for="contact_notes">Additional Contact</label><input type="submit" class="btn btn-primary" style="float:right;" value="Add"/>
       <p class="field">
    <input class="form-control" type="text" name="extra[]" value="<?= $des[0]; ?>" /> 
  </p>
  </div>
  <button class="btn btn-primary">Update</button>
  &nbsp;&nbsp;
  <a href="/cm-php/delete.php?id=<?= $contact['id']; ?>" class="btn btn-delete" style="
    color: #B71C1C;">Delete</a>

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
<?php   include 'footer.php'; ?>
