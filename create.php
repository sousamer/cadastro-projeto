<?php

$page_title = "Criar Usuário";
include_once "header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Ver Usuários ";
    echo "</a>";
echo "</div>";

include_once 'classes/database.php';
include_once 'initial.php';


if ($_POST){

    include_once 'classes/user.php';
    $user = new User($db);

    $user->firstname = htmlentities(trim($_POST['firstname']));
    $user->lastname = htmlentities(trim($_POST['lastname']));
    $user->email = htmlentities(trim($_POST['email']));
    $user->mobile = htmlentities(trim($_POST['mobile']));

    if($user->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Successo! Usuário criado";
        echo "</div>";
    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Não é possível criar";
        echo "</div>";
    }
}
?>

<form action='create.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nome</td>
            <td><input type='text' name='firstname'  class='form-control' placeholder="Insira o nome" required></td>
        </tr>

        <tr>
            <td>Sobrenome</td>
            <td><input type='text' name='lastname' class='form-control' placeholder="Insira o sobrenome" required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='email' name='email' class='form-control' placeholder="Insira o e-mail" required></td>
        </tr>

        <tr>
            <td>Telefone</td>
            <td><input type='number' name='mobile' class='form-control' placeholder="Insira o número de telefone" required></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Criar
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "footer.php";
?>

