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
				$total = 0;
				foreach ($_POST['multi'] as $select){
					if ($select === $_SESSION['correct1'] || $select === $_SESSION['correct2'] || $select === $_SESSION['correct3']){
						$total += 1;
					} 
				}

				if($total == 3){
					$status = 'correct';
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


		header('Location: test_main.php');
?> 


