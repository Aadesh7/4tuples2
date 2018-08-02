<?php 
	include 'dbconn.php';

		
			if(isset($_POST['end'])){
				$insert1 = $_POST['test'];
				$insert2 = $_POST['test1'];

				if ($insert1 === $_SESSION['correct1'] && $insert2 === $_SESSION['correct2']){
					$status = 'correct';
				}
				else{
					$status = 'incorrect';
				}
			}
			
			if(isset($_POST['send'])){	
				$insert1 = $_POST['test'];

				if($insert1 === $_SESSION['correct1']){
					$status = 'correct';
				}elseif($insert1 === ''){
					$status = 'no attempt';
				}
				else{
					$status = 'incorrect';
				}
			}

		if(isset($_POST['submit'])){

			if($_POST['option'] === $_SESSION['correct']){
				$status = 'correct';
			}
			else{
				$status = 'incorrect';
			}

		}
		$count = $_SESSION['count'];
		$sql = "INSERT INTO ans VALUES ('$count', '$status')";
		$result = mysqli_query($conn, $sql);

		$count = $count + 1;
		$_SESSION['count'] = $count; 


		header('Location: practice_main.php');
?> 


