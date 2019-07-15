<?php include_once 'Database.php';

if(isset($_POST['name'])    && isset($_POST['description'])){

	$name=  $_POST['name'];
	$description= $_POST['description'];
	if( $name !="")
	try {

		$insert="insert into tasks(name ,description , status , created_at)
			values(:name , :description , 'not Completed' , now() )";


		$statment=$conn->prepare($insert);

		$statment->execute( array(":name" =>$name  ,":description"=>$description  ));

		if($statment){
			echo "Task Inserted";
		}
		
	} catch (PDOException $e) {
		echo "error " . $e;
	}
	else  echo "Task name is empty";

}

