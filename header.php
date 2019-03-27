<?php
  include 'database.php';
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8">
   <title>Interview-Address-Book</title>

   <!-- MOBILE -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP -->
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   <!-- FONT AWESOME -->
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
   <script src="https://use.fontawesome.com/587778f1fd.js"></script>
   <!-- CUSTOM CSS -->
   <link rel="stylesheet" type="text/css" href="./css/style.css">
   <!-- GOOGLE FONTS -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600|Roboto+Slab:100,300,400" rel="stylesheet">
   </head>
 <body>
   <nav class="navbar">
<!-- MODIFIED FROM EXAMPLE CODE AT https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_sidenav -->
    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <a href="index.php">All Contacts</a>
	  </br>
	  <a href="adddata.php">Add Data =></a>
      <a style="position: absolute;bottom: 0;" href="https://github.com/twistsmyth/interview-address-book">GitHub</a>

    </div>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>
</nav>
