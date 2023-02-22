<?php
    $query = "SELECT * FROM soc";
    $prep = $con->prepare($query);
    $prep->execute();
    $data = $prep->fetchAll();
?>

<div class="container col-12 justify-content-center d-flex mt-4" id="bot">
    <div>
    <?php foreach($data as $item){
            echo "<a href=" .$item->src. "><i class=" .$item->name. "></i></a></li>";
        }
    ?>
    </div>    
</div>

<script src="assets/js/jquery.js" type="text/javaScript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>