<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <link rel="stylesheet" type="text/css" href="mcq_frontEnd.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>mcq</title>
    <style>
	#div1 {
    width: 350px;
    height: 150px;
    padding: 10px;
    border: 1px solid #aaaaaa;
	}
	#div2{
  	width: 350px;
  	height: 150px;
  	padding: 10px;
  	border: 1px solid #aaaaaa;
	}
	</style>
	    <script>

	function allowDrop(ev) {
    	ev.preventDefault();
	}

	function drag(ev) {
    	ev.dataTransfer.setData("Text", ev.target.id);
	}	

	function drop(ev) {
    	var data = ev.dataTransfer.getData("Text");
    	ev.target.appendChild(document.getElementById(data));
    	ev.preventDefault();
	}

	function getData(){
  		var flag = true;
  		var div1 = document.getElementById('div1');
  		var div2 = document.getElementById('div2');
  		var data1 = div1.textContent;
  		var data2 = div2.textContent;
//  console.log("data is ",data1);
  		if((data1===""||data1===null)&&(data2 ===""||data2===null)){
    		flag = false;
  		} else{
    		var testField = document.getElementById('test');
    		var testField2 = document.getElementById('test1');
    		testField.value = data1;
    		testField2.value = data2;
  		}
  		return flag;
	}
	</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#"style="padding-left: 42%">TOEFL PRACTICE SET</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
</body>
</html>
<?php
	include 'session.php';
	if(isset($_POST['mybutton'])){
		$val = $_POST['mybutton'];
		$_SESSION['dbname'] = $val;
	}
	include 'dbconn.php';
	echo $_SESSION['dbname'];
	include 'timer.php';
	$_SESSION['testcomplete'] = 'yes';
?>

<!DOCTYPE html>
<html>
<head>
	<script>
		//document.querySelector('iframe').contentDocument.write("<h1>Injected from parent frame</h1>")
	</script>	
	<title>
		
	</title>
	<!--<script src='js/jquery.js'></script>
    <script src="js/main.js"></script>--> 

</head>
<body onLoad="backButtonOverride()">

<div style="margin-top: 5%;">

    <div id='questions' style="padding-left: 15%;padding-top: 55px;width: 500px;margin-left: 150px;float: left;float: left;height: 200px">
<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->   

    <?php
		if($dbname == 'quest'){	
			$count = 1;
			if(isset($_SESSION['count'])){
				$count = $_SESSION['count'];
			}
			
			
			if($count%13 != 0){	
				$table_name = 'quanda';

				if ($count%12 == 0){
					$table_name = 'table2';
				}

				$sql = "SELECT * FROM $table_name WHERE id= $count";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<p>";
							echo $row['question']; echo "<br>";
						echo "</p>";
						$_SESSION['correct'] = $row['correct'];
						$_SESSION['count'] = $row['id'];

						echo '<form action="test_redirect.php" method="post" id="ques_form">';
  							echo '<input type="radio" name="option" value="ans1">'; echo $row['ans1'] ;echo "<br>";
  							echo '<input type="radio" name="option" value="ans2">'; echo $row['ans2'] ;echo "<br>";
  							echo '<input type="radio" name="option" value="ans3">'; echo $row['ans3'] ;echo "<br>";
  							echo '<input type="radio" name="option" value="ans4">'; echo $row['ans4'] ;echo "<br>";echo"<br>";
  							echo '<input type="submit" class="button" name="submit" value="next" id="next_button"/>';

					
						echo '</form>';
						echo '</div>';
						echo '<div style="overflow-y: scroll;width: 400px;height:300px;float: left;margin-right: 250px;float: left;margin-top: 50px;">';
						echo $row['passage'];

						echo '</div>';
                        echo '</div>';


					}



				} else {
					echo "There are no questions";
					session_destroy();
				}
			}else{




                $table_name = 'table_3';
				$sql = "SELECT * FROM $table_name WHERE id= $count";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<p>";
							echo $row['question']; echo "<br>";
						echo "</p>";
						$_SESSION['correct1'] = $row['correct1'];
						$_SESSION['correct2'] = $row['correct2'];
						$_SESSION['correct3'] = $row['correct3'];
						$_SESSION['count'] = $row['id'];





						echo '<form action="test_redirect.php" method="post" id="ques_form">';
  							echo '<select name="multi[]" multiple size="6">';
  								echo '<option name="option" value="ans1"style="width: 200px;height: 20px;padding-top: 5px;">'; echo $row['ans1'] ;echo "<br>";
  								echo '<option name="option" value="ans2">'; echo $row['ans2'] ;echo "<br>";
  								echo '<option name="option" value="ans3">'; echo $row['ans3'] ;echo "<br>";
  								echo '<option name="option" value="ans4">'; echo $row['ans4'] ;echo "<br>";
  								echo '<option name="option" value="ans5">'; echo $row['ans5'] ;echo "<br>";
  								echo '<option name="option" value="ans6">'; echo $row['ans6'] ;echo "<br>";
  							echo '</select>';	echo '<br>';echo '<br>';
  							echo '<input type="submit" class="button" name="send" value="next" id="next_button"/>';


						echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div style="width: 400px;height: 300px;overflow-y: scroll;float: left;margin-left: 23px;margin-top: 5%">';

                        echo $row['passage'];
                        echo '</div>';
                        echo '<div style="background-color: burlywood;float: left">';


					}

				} else {
					echo "There are no questions";
					session_destroy();
				}
			}
		}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		
		elseif($dbname == 'quest2'){
			$count = 1;
			if(isset($_SESSION['count'])){
				$count = $_SESSION['count'];
			}
			
			
			if($count%13 != 0){	
				$table_name = 'quanda';

				if ($count%12 == 0){
					$table_name = 'table2';
				}

				$sql = "SELECT * FROM $table_name WHERE id= $count";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<p>";
							echo $row['question']; echo "<br>";
						echo "</p>";
						$_SESSION['correct'] = $row['correct'];
						$_SESSION['count'] = $row['id'];

						echo '<form action="test_redirect.php" method="post" id="ques_form">';
  							echo '<input type="radio" name="option" value="ans1">'; echo $row['ans1'] ;echo "<br>";
  							echo '<input type="radio" name="option" value="ans2">'; echo $row['ans2'] ;echo "<br>";
  							echo '<input type="radio" name="option" value="ans3">'; echo $row['ans3'] ;echo "<br>";
  							echo '<input type="radio" name="option" value="ans4">'; echo $row['ans4'] ;echo "<br>";echo"<br>";
  							echo '<input type="submit" class="button" name="submit" value="next" id="next_button"/>';

					
						echo '</form>';
						echo '</div>';
						echo '<div style="overflow-y: scroll;width: 400px;height:300px;float: left;margin-right: 250px;float: left;margin-top: 50px;">';
						echo $row['passage'];

						echo '</div>';
                        echo '</div>';


					}



				} else {
					echo "There are no questions";
					session_destroy();
				}
			}else{

				$table_name = 'table_3';
				$sql = "SELECT * FROM $table_name WHERE id= $count";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<p>";
							echo $row['question']; echo "<br>";
						echo "</p>";
						$_SESSION['count'] = $row['id'];
						$_SESSION['correct1'] = $row['correct1'];
						$_SESSION['correct2'] = $row['correct2'];
			?>
				<form action="test_redirect.php" method = "post" id="myform" onsubmit="return getData();">
					<div id="div1" name="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div><br>
					<div id = "div2" name = "div2" ondrop = "drop(event)" ondragover  = "allowDrop(event)"></div>
					<input type="hidden" name="test" id="test">
					<input type="hidden" name = "test1" id = "test1">
					<input type = 'submit' name="end" value="next">
				</form>
			<?php	
				echo '<p id="drag1" draggable="true" ondragstart="drag(event)">'.$row['ans1'];'</p>';
            	echo '<p id="drag2" draggable="true" ondragstart="drag(event)">'.$row['ans2'];'</p>';
            	echo '<p id="drag3" draggable="true" ondragstart="drag(event)">'.$row['ans3'];'</p>';
            	echo '<p id="drag4" draggable="true" ondragstart="drag(event)">'.$row['ans4'];'</p>';
            	echo '<p id="drag5" draggable="true" ondragstart="drag(event)">'.$row['ans5'];'</p>';
            	echo '<p id="drag6" draggable="true" ondragstart="drag(event)">'.$row['ans6'];'</p>';
            	echo '<p id="drag7" draggable="true" ondragstart="drag(event)">'.$row['ans7'];'</p>';
            	echo '<p id="drag8" draggable="true" ondragstart="drag(event)">'.$row['ans8'];'</p>';
				echo '</div>';
                echo '</div>';
                echo '</div>';
              
                echo '</div>';
                echo '<div style="background-color: burlywood;float: left">';


					}

				} else {
					echo "There are no questions";
					session_destroy();
				}
			}
		}
		else{
			echo "quaaaaaaak! error!!!";
		}

	?>

	</div>
	<script>
	function backButtonOverride()
		{
  			// Work around a Safari bug
  			// that sometimes produces a blank page
  			setTimeout("backButtonOverrideBody()", 1);

		}

	function backButtonOverrideBody(){
  		// Works if we backed up to get here
  		try {
    		history.forward();
  		} catch (e) {
    	// OK to ignore
  		}
  		setTimeout("backButtonOverrideBody()", 500);
	}
</script>

	<div id="timer_import">
		<!--<iframe src="timer.php" style="height:200px;width:300px"></iframe>-->
	</div>
	<!--<button type='submit' name='submit'>Next</button>-->
</div>
</body>
</html>