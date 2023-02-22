<?php
$id = $_GET['id'];
require_once ("connection.php");
$info = $con->query("SELECT p.id, p.name AS pname, author, pages, date, description, 
GROUP_CONCAT(g.name SEPARATOR ', ') AS genre
FROM genre g INNER JOIN product_genre pg ON g.id=pg.genre_id INNER JOIN products p ON p.id=pg.product_id
WHERE p.id= $id
GROUP BY p.id")->fetch();
?>

<div class="modal-header">
    <h4 class="modal-title"><?= $info->pname ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body d-flex text-center justify-content-center align-items-center">
    <p>By: <?= $info->author ?><br>
        Release Date: <?= $info->date ?><br>
        Number of pages: <?= $info->pages ?><br>
        Genre: <?= $info->genre ?><br>
        Description: <?= $info->description ?></p>
</div>