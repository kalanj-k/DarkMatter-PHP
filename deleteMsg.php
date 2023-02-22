<?php
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        header("Location: index.php");
    }
    if(isset($_POST['id'])){
        $id = intval($_POST['id']);
        include("connection.php");
        header("Content-type:application/json");
        $code=404;
        $data=null;
        $query = "DELETE FROM messages WHERE id = :id";
        $msgprep = $con->prepare($query);
        $msgprep->bindParam(':id', $id);
        try{
            $code = $msgprep->execute() ? 201 : 500;
            $data = 'success';
        }
        catch(PDOException $e){
            $code = 500;
            $data = $e;
        }
        http_response_code($code);
        echo json_encode($data);
 }
?>