    <footer>
    </footer>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
		  $("input[value='Add']").click(function(event){
			event.preventDefault();
			$("p.field:last").clone().insertAfter("p.field:last");
		  });
		});
	</script>

 </body>
</html>
