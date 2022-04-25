<?php include"connection/connection.php" ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD</title>
</head>
<style type="text/css">
 * {
 	margin: 0;
 }

 input[type='text'] {
   height: 25px;	
   width: 340px;
   padding: 4px;
   margin: 5px;
 }	

  input[type='submit'] {
   width: 220px;
   padding: 5px;
   margin: 5px;
 }	

  button {
   width: 220px;
   padding: 5px;
   margin: 5px;
 }	

 .updateModal {
  height: 920px; width: 100%; background-color: #f7f7f7; top: 0; left: 0; position: absolute; display: none;
 }

</style>
<body>

<div style="height: 920px; width: 100%; background-color: #f7f7f7;">
	<div style="height: 50px; width: 100%; text-align: center;">
		<h1 style="padding: 4px;">CRUD</h1>
	</div>
    <div style="height: 120px; width: 80%; padding: 40px; margin: 10px auto; background-color: #ffffff; border-radius: 20px; text-align: center;">
    	<!-----------"Create" Insert the data using POST method--------->
  	     <form method="POST" action="serv/serv-insert.php">
  		   <input type="text" name="title" placeholder="Title">
  		   <br>
  		   <input type="text" name="description" placeholder="Description">
  		   <br>
  		   <input type="submit" name="create" value="Create">
  	     </form>
    </div>

    <div style="height: 500px; width: 80%; padding: 40px; margin: auto; background-color: #ffffff; text-align: center; border-radius: 20px; overflow-x: scroll;">
  	
     <?php
       // Fetch all data from a table "data" ordered by ID with LIMIT 10
       $tableData = "SELECT * FROM data ORDER BY id DESC LIMIT 10";
       $tableDataResult = mysqli_query($conn, $tableData);
       if (mysqli_num_rows($tableDataResult) > 0) {
         while($row = mysqli_fetch_assoc($tableDataResult)) {
         $table_id = $row["table_id"];
         $title = $row["title"];
     ?>
        <!------Fetch title--->
        <h2><?php echo $title; ?></h2>
        <br>
        <!---Update Button for Modal Box--->        
        <button id="update" class="update" extract-table-id="<?php echo $table_id; ?>">Update</button>
        <!---Delete Data--->
         <form method="POST" action="serv/serv-delete.php">
  	      <input type="submit" name="delete" value="Delete">
  	      <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
         </form>
        <br>

        <div id="updateModal-<?php echo $table_id ?>" class="updateModal" style="">
	      <div style="height: 440px; width: 680px; background-color: #fff; border-radius: 14px; margin: 120px auto;">
		   <form method="POST" action="serv/serv-update.php">
		     <input type="text" name="updateTitle" value="<?php echo $title; ?>">
		     <input type="hidden" name="table_id" value="<?php echo $table_id; ?>">
		      <br>
		      <input type="submit" name="" value="Done">
		      <br>
	       </form>
           <button id="close" class="close" extract-table-id="<?php echo $table_id; ?>">Close</button> 
	     </div>
        </div>

     <?php
        }
       } else {
     ?>   	
       <div style="height: 50px; width: 80%; margin: auto; background-color: #ffffff;">
       	 <h2>Empty!</h2>
       </div>
      <?php
       }
      ?>
     </div>
</div>
</body>
</html>


<script type="text/javascript">
  // To Open Update Modal Box
  var modalBtns = [...document.querySelectorAll(".update")];
modalBtns.forEach(function(btn){
  btn.onclick = function() {
    var modal = btn.getAttribute('extract-table-id');
    document.getElementById('updateModal-'+modal).style.display = "block";
  }
});
  // To Close Update Modal Box
  var modalBtns = [...document.querySelectorAll(".close")];
modalBtns.forEach(function(btn){
  btn.onclick = function() {
    var modal = btn.getAttribute('extract-table-id');
    document.getElementById('updateModal-'+modal).style.display = "none";
  }
});
</script>