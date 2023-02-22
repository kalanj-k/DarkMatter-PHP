<?php
    include("connection.php");
    if($_POST['id']){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $recommended = intval($_POST['recommended']);
        $instock = intval($_POST['instock']);
        $err=false;
        var_dump($instock);
        $reName = "/^[A-Za-z0-9\&\s\-_,\.;:()]+$/";
        $rePrice = "/^\d+\.?\d{2}$/";

        if(!preg_match($reName,$name)){
            $err = true;
        }
        if(!preg_match($rePrice,$price)){
            $err = true;
        }

        if($err){
            echo "Something isn't quite right!";
        }
        else{
                $query = "UPDATE products SET name = :name, price = :price, recommended = :recommended, instock = :instock 
                WHERE id = :id";
                $prep = $con->prepare($query);
                $prep->bindParam(":id", $id);
                $prep->bindParam(":name", $name);
                $prep->bindParam(":price", $price);
                $prep->bindParam(":recommended", $recommended);
                $prep->bindParam(":instock", $instock);
                $result = $prep->execute();
                $message = "Uspesno promenjen proizvod";
                if($result){
                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode(['message' => $message]);
                }
        }

    }
?>