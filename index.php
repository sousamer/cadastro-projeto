<?php

include_once 'classes/database.php';
include_once 'classes/user.php';
include_once 'initial.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;

$user = new User($db);

$page_title = "Usuários";
include_once "header.php";

echo "<div class='right-button-margin'>";
echo "<a href='create.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Criar Usuário";
echo "</a>";
echo "</div>";

$prep_state = $user->getAllUsers($from_record_num, $records_per_page);
$num = $prep_state->rowCount();

if($num>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Sobrenome</th>";
    echo "<th>E-Mail</th>";
    echo "<th>Telefone</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row);

        echo "<tr>";

        echo "<td>$row[firstname]</td>";
        echo "<td>$row[lastname]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[mobile]</td>";

        echo "<td>";
        // edit user button
        echo "<a href='edit.php?id=" . $id . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Editar";
        echo "</a>";

        // delete user button
        echo "<a href='delete.php?id=" . $id . "' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Deletar";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    include_once 'pagination.php';
}

else{
    echo "<div> No User found. </div>";
    }
?>

<?php
include_once "footer.php";
?>