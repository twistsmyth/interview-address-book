<?php
  include 'header.php';

  //$contacts = $db->query('SELECT * FROM contacts')->fetchALL(PDO::FETCH_ASSOC);
  
	if(isset($_POST['search'])) {
		$keyword=$_POST['search'];
		$sql="SELECT * FROM `contacts` WHERE `last` LIKE :keyword;";
		$contacts=$db->prepare($sql);
		$contacts->bindValue(':keyword','%'.$keyword.'%');
		$contacts->execute();
	}else{
		
		$contacts = $db->query('SELECT * FROM contacts')->fetchALL(PDO::FETCH_ASSOC);
	}
  
?>

<div class="container panel panel-default">
  <div class="row panel-heading">
      <a href="/cm-php/index.php"><h1 class="panel-title">Contacts</h1></a>
	  	  <form class="search" action="" method="post"><input type="text" name="search"><input type="submit" name="submit" value="Search By Surname"></form>
  </div>

<?php foreach ($contacts as $contact) :?>
        <a href="/cm-php/edit.php?id=<?=$contact['id'];?>">
        <div class="row contact-box" id="presentation">
          <div class="col-xs-6 col-sm-6 left-detail">
            <span class="name"><?= $contact['first']; ?> <?= $contact['last']; ?></span><br>
            <span class="title"><?= $contact['title']; ?></span><br></span>
          </div>
          <div class="col-xs-6 col-sm-6 right-detail">
            <p><span class="detail text-muted"><i class="fa fa-mobile" aria-hidden="true">&nbsp;&nbsp;</i><?= $contact['phone']; ?></span><br></span></p>
            <p><span class="detail text-muted"><i class="fa fa-at" aria-hidden="true"></i>&nbsp;&nbsp;<?= $contact['address']; ?></span><br></span></br>
            <span class="detail text-muted"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbsp;&nbsp;<?= $contact['extra']; ?></span><br></span>
          </div>
        </div>
      </a>

<?php endforeach; ?>

</div>

<div id="container-floating">

  <div id="floating-button" data-toggle="tooltip" data-placement="left" data-original-title="Create" onclick="location.href='new.php';">
    <p class="plus">+</p>
    <img class="edit" src="http://ssl.gstatic.com/bt/C3341AA7A1A076756462EE2E5CD71C11/1x/bt_compose2_1x.png">
  </div>

</div>


<?php include 'footer.php';?>
