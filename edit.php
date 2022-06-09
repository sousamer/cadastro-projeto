<?php
$page_title = "Editar Usuário";
include_once "header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Ver Usuários ";
    echo "</a>";
echo "</div>";

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object user file
include_once 'classes/database.php';
include_once 'classes/user.php';
include_once 'initial.php';

$user = new User($db);
$user->id = $id;
$user->getUser();

if($_POST)
{

    // set user property values
    $user->firstname = htmlentities(trim($_POST['firstname']));
    $user->lastname = htmlentities(trim($_POST['lastname']));
    $user->mobile = htmlentities(trim($_POST['mobile']));
    $user->email = htmlentities(trim($_POST['email']));

    if($user->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Sucesso! Usuário editado";
        echo "</div>";
    }

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Erro! Não pode editar o usuário";
        echo "</div>";
    }
}
?>

    <form action='edit.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>Nome</td>
                <td><input type='text' name='firstname' value='<?php echo $user->firstname;?>' class='form-control' placeholder="Insira o nome" required></td>
            </tr>

            <tr>
                <td>Sobrenome</td>
                <td><input type='text' name='lastname' value='<?php echo $user->lastname;?>' class='form-control' placeholder="Insira o sobrenome" required></td>
            </tr>

            <tr>
                <td>E-mail</td>
                <td><input type='email' name='email' value='<?php echo $user->email;?>' class='form-control' placeholder="Insira o e-mail" required></td>
            </tr>

            <tr>
                <td>Telefone</td>
                <td><input type='number' name='mobile' value='<?php echo $user->mobile;?>' class='form-control' placeholder="Insira o número de telefone" required></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> Atualizar
                    </button>
                </td>
            </tr>

        </table>
    </form>

<?php
include_once "footer.php";
?>