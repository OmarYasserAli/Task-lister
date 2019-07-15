
<?php include_once "database.php";
 


  if(isset($_POST['id'])){
        $Q="delete from tasks
            where id = :id";

        $id =$_POST['id'];
   
 try {

$statment=$conn->prepare($Q);



$statment->execute(array(':id'=>$id));

if($statment){
    echo "Task deleteed successfully";
}


 } catch (PDOException $e) {
     echo "error ". $e;
 }
 
}
?>