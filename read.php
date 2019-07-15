


<?php include_once "database.php";
 try {
     $Q="select * from tasks";

$statment=$conn->query($Q);


while($task = $statment->fetch(PDO::FETCH_OBJ)){
    $output="
        <tr>
                <td onclick=\"makeElEditable(this.children[0])\" class='editable'><div  
                onblur=\"updatename(this, {$task->id})\">$task->name</div></td>

                <td onclick=\"makeElEditable(this.children[0])\" class='editable' > <div 
                onblur=\"updatedescription(this, {$task->id})\"> $task->description </div> </td>
                <td class='editable' ondblclick=\"toggleComplete(this , {$task->id})\"> <div >$task->status</div> </td>
                <td>date $task->created_at</td>
                <td style=\"width: 5%;\">
                    <button onclick=\"delTask({$task->id})\"  class=\"btn-danger \" >
                      <i  class=\"fa fa-times\"></i>
                    </button>
                </td>
            </tr>
    ";

    echo $output;
}
 } catch (PDOException $e) {
     echo "error ". $e;
 }

?>