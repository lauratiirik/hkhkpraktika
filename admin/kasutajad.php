<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'template.php';
require 'db.php';

require 'auth.php';

require_admin();

head();
?>

<h1>
    Kasutajate haldus
    <a href="kasutajainfo.php" class="btn-primary btn float-right">
        <i class="fas fa-plus"></i>
        Lisa kasutaja
    </a>
</h1>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nimi</th>
            <th>Kasutaja</th>
            <th>Admin</th>
        </tr>
    </thead>
    <tbody>

<?php
        
$conn = db_connect();
$stmt = $conn->prepare("SELECT * FROM praktika_kasutajad");
$stmt->execute();
$result = $stmt->get_result();

foreach ($result->fetch_all() as $row){
    //var_dump($row);

?>

<tr>
    <td><?= $row[0]; ?></td>
    <td><a href="kasutajainfo.php?id=<?=$row[0]?>"><?= $row[1]; ?></a></td>
    <td><?= $row[2]; ?></td>
    <td><?= $row[4]; ?></td>
</tr>
        
<?php
}
?>
        
    </tbody>
</table>

<?php
foot();
?> 