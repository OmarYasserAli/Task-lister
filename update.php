<?php include_once 'Database.php';

if(isset($_POST['name'])    && isset($_POST['id'])){

	$name=  trim($_POST['name']);
	$id= $_POST['id'];

	try {

		$insert="update  tasks set name = :name
			where id = :id";


		$statment=$conn->prepare($insert);

		$statment->execute( array(":name" =>$name  ,":id"=>$id  ));

		if($statment->rowCount() === 1){
			echo "Task updated";
		}
		
	} catch (PDOException $e) {
		echo "error " . $e;
	}

}else if(isset($_POST['description'])    && isset($_POST['id'])){

	$description=  trim($_POST['description']);
	$id= $_POST['id'];

	try {

		$insert="update  tasks set description = :description
			where id = :id";


		$statment=$conn->prepare($insert);

		$statment->execute( array(":description" =>$description  ,":id"=>$id  ));

		if($statment->rowCount() === 1){
			echo "Task updated";
		}
		
	} catch (PDOException $e) {
		echo "error " . $e;
	}

}else if(isset($_POST['tglcom']) && isset($_POST['id'])){


	$id= $_POST['id'];

	try {
		$Q="select status from tasks where id= :id";

		$statment=$conn->prepare($Q);
		$statment->execute(array(':id'=>$id));
		$task = $statment->fetch();
		if( $task[0] =="not Completed"){
			$insert="update  tasks set status = 'Completed'
			where id = :id";


			$statment=$conn->prepare($insert);

			$statment->execute( array(":id"=>$id  ));
			if($statment){
			echo "Task Completed ";
			}
		}else if( $task[0] =="Completed"){
			$insert="update  tasks set status = 'not Completed'
			where id = :id";


			$statment=$conn->prepare($insert);

			$statment->execute( array(":id"=>$id  ));
			if($statment){
			echo "Task updated";
			}
		}
		/*
		
*/
		
		
	} catch (PDOException $e) {
		echo "error " . $e;
	}
}