<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require './template.php';
require './db.php';

require 'auth.php';


$conn = db_connect();


if (isset($_GET['csv'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=ettevotted.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, ['id', 'Ettevõtte nimi', 'Valdkond', 'Registrikood', 'Aadress', 'Juhendaja nimi', 'Juhendaja e-Post', 'Telefon', 'Koduleht', 'Kontakt', 'Lisainfo', 'Tunnustatud', 'Üldtelefon']);
    $stmt = $conn->prepare("SELECT * FROM praktika_ettevotted");
    $stmt->execute();
    $result = $stmt->get_result();
    while($row = $result->fetch_row()) {
        $row[11] = $row[11] ? 'Jah' : '';
        if (!empty($row[2])) {
            $row[2] = implode(', ', json_decode($row[2]) ?? []);
        } 
        fputcsv($output, $row);
    }
    exit();
}


head();

$search = $_GET['q'] ?? null;
$valdkond = $_GET['valdkond'] ?? null;



?>
<style>
.btn-koik {
    background-color: #FADBD8;
}
.btn-koik:hover {
    background-color: #F5B7B1 ;
}
.btn-koik:active, .btn-koik.active {
    background-color: #F1948A;
}
.btn-sotsiaal {
    background-color: #EBDEF0 ;
}
.btn-sotsiaal:hover {
    background-color: #D7BDE2 ;
}
.btn-sotsiaal:active, .btn-sotsiaal.active {
    background-color: #C39BD3;
}
.btn-majutus {
    background-color: #D4E6F1 ;
}
.btn-majutus:hover {
    background-color: #A9CCE3 ;
}
.btn-majutus:active, .btn-majutus.active {
    background-color: #7FB3D5;
}
.btn-it {
    background-color: #D1F2EB ;
}
.btn-it:hover {
    background-color: #A3E4D7 ;
}
.btn-it:active, .btn-it.active {
    background-color: #76D7C4;
}
.btn-puit {
    background-color: #FCF3CF ;
}
.btn-puit:hover {
    background-color: #F9E79F ;
}
.btn-puit:active, .btn-puit.active {
    background-color: #F7DC6F;
}
.btn-ehitus {
    background-color: #D5D8DC ;
}
.btn-ehitus:hover {
    background-color: #ABB2B9 ;
}
.btn-ehitus:active, .btn-ehitus.active {
    background-color: #808B96;
}
.btn-turism {
    background-color: #F2D7D5 ;
}
.btn-turism:hover {
    background-color: #E6B0AA ;
}
.btn-turism:active, .btn-turism.active {
    background-color: #D98880;
}
.btn-kontoritoo {
    background-color: #3498DB ;
}
.btn-kontoritoo:hover {
    background-color: #2E86C1 ;
}
.btn-kontoritoo:active, .btn-kontoritoo.active {
    background-color: #2874A6;
}
.btn-kasitoo {
    background-color: #16A085 ;
}
.btn-kasitoo:hover {
    background-color: #138D75 ;
}
.btn-kasitoo:active, .btn-kasitoo.active {
    background-color: #117A65;
}

</style>

<h1 class="mb-3">
    Praktikaettevõtted
    <a href="praktika.php" class="btn-primary btn float-right">
        <i class="fas fa-plus"></i>
        Lisa ettevõtte
    </a>
    <a href="?csv" class="btn-secondary btn float-right mr-3">
        <i class="fas fa-download"></i>
        CSV
    </a>

</h1>

    <form class="mb-3">
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-koik <?=empty($valdkond) ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="" <?=empty($valdkond)  ? 'checked' : ''?> onchange="this.form.submit();"> Kõik
                </label>
                <label class="btn btn-sotsiaal <?=$valdkond == 'Sotsiaalhooldus' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Sotsiaalhooldus" <?=$valdkond == 'Sotsiaalhooldus' ? 'checked' : ''?> onchange="this.form.submit();"> Sotsiaalhooldus
                </label>
                <label class="btn btn-majutus <?=$valdkond == 'Majutus- ja toitlustusteenindus' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Majutus- ja toitlustusteenindus" <?=$valdkond == 'Majutus- ja toitlustusteenindus' ? 'checked' : ''?> onchange="this.form.submit();"> Majutus- ja toitlustusteenindus
                </label>
                <label class="btn btn-it <?=$valdkond == 'IT' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="IT" <?=$valdkond == 'IT' ? 'checked' : ''?> onchange="this.form.submit();"> IT
                </label>
                <label class="btn btn-puit <?=$valdkond == 'Puit' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Puit" <?=$valdkond == 'Puit' ? 'checked' : ''?> onchange="this.form.submit();"> Puit
                </label>
                <label class="btn btn-ehitus <?=$valdkond == 'Ehitus' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Ehitus" <?=$valdkond == 'Ehitus' ? 'checked' : ''?> onchange="this.form.submit();"> Ehitus
                </label>
                <label class="btn btn-turism <?=$valdkond == 'Turism' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Turism" <?=$valdkond == 'Turism' ? 'checked' : ''?> onchange="this.form.submit();"> Turism
                </label>
                <label class="btn btn-kontoritoo <?=$valdkond == 'Kontoritöö' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Kontoritöö" <?=$valdkond == 'Kontoritöö' ? 'checked' : ''?> onchange="this.form.submit();"> Kontoritöö
                </label>
                <label class="btn btn-kasitoo <?=$valdkond == 'Käsitöö' ? 'active' : ''?>">
                    <input type="radio" name="valdkond" value="Käsitöö" <?=$valdkond == 'Käsitöö' ? 'checked' : ''?> onchange="this.form.submit();"> Käsitöö
                </label>
        </div>
    </form>

<div style="overflow-x: scroll">
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Ettevõtte nimi</th>
            <?php if ($_SESSION['user']->Admin == 1) { ?>
                <th>Registrikood</th>
            <?php } ?>
            <th>Valdkond</th>
            <th>Aadress</th>
            <th>Kontakt</th>
            <th>Üldtelefon</th>
            <th>Koduleht</th>
            <th>Juhendaja nimi</th>
            <th>Juhendaja e-Post</th>
            <th>Telefon</th>
            <th>Lisainfo</th>
            <th>Tunnustatud</th>
        </tr>
    </thead>
    <tbody>

<?php
        
$page_size = 15;
$page = $_GET['p'] ?? 1;
$offset = ($page - 1) * $page_size;

if (!empty($search)) {
    $s = "%$search%";
    if (!empty($valdkond)) {
        $valdkond = json_encode($valdkond);
        $countStmt = $conn->prepare("SELECT COUNT(*) FROM praktika_ettevotted WHERE (Nimi LIKE ? OR Registrikood LIKE ? OR Aadress LIKE ? OR Juhendaja LIKE ?) AND JSON_CONTAINS(Valdkond, ?)");
        $countStmt->bind_param('sssss', $s, $s, $s, $s, $valdkond);
        $countStmt->execute();
        $result = $countStmt->get_result();
        $count = $result->fetch_row()[0];

        $stmt = $conn->prepare("SELECT * FROM praktika_ettevotted WHERE (Nimi LIKE ? OR Registrikood LIKE ? OR Aadress LIKE ? OR Juhendaja LIKE ?) AND JSON_CONTAINS(Valdkond, ?) LIMIT ?,?");
        $stmt->bind_param('sssssii', $s, $s, $s, $s, $valdkond, $offset, $page_size);
    } else {
        $countStmt = $conn->prepare("SELECT COUNT(*) FROM praktika_ettevotted WHERE (Nimi LIKE ? OR Registrikood LIKE ? OR Aadress LIKE ? OR Juhendaja LIKE ?)");
        $countStmt->bind_param('ssss', $s, $s, $s, $s);
        $countStmt->execute();
        $result = $countStmt->get_result();
        $count = $result->fetch_row()[0];

        $stmt = $conn->prepare("SELECT * FROM praktika_ettevotted WHERE (Nimi LIKE ? OR Registrikood LIKE ? OR Aadress LIKE ? OR Juhendaja LIKE ?) LIMIT ?,?");
        $stmt->bind_param('ssssii', $s, $s, $s, $s, $offset, $page_size);
    }
} else {
    if (!empty($valdkond)) {
        $valdkond = json_encode($valdkond);
        $countStmt = $conn->prepare("SELECT COUNT(*) FROM praktika_ettevotted WHERE JSON_CONTAINS(Valdkond, ?)");
        $countStmt->bind_param('s', $valdkond);
        $countStmt->execute();
        $result = $countStmt->get_result();
        $count = $result->fetch_row()[0];

        $stmt = $conn->prepare("SELECT * FROM praktika_ettevotted WHERE JSON_CONTAINS(Valdkond, ?) LIMIT ?,?");
        $stmt->bind_param('sii', $valdkond, $offset, $page_size);
    } else {
        $countStmt = $conn->prepare("SELECT COUNT(*) FROM praktika_ettevotted");
        $countStmt->execute();
        $result = $countStmt->get_result();
        $count = $result->fetch_row()[0];

        $stmt = $conn->prepare("SELECT * FROM praktika_ettevotted LIMIT ?,?");
        $stmt->bind_param('ii', $offset, $page_size);
    }
}


$num_pages = ceil($count / $page_size);

$stmt->execute();
$result = $stmt->get_result();

foreach ($result->fetch_all() as $row){

?>

<tr>
    <td><?= $row[0] ?></td>
    <td><a href="praktika.php?id=<?=$row[0]?>"><?= $row[1] ?></a></td>
    <?php if ($_SESSION['user']->Admin == 1) { ?>
        <td><?= $row[3] ?></td>
    <?php } ?>
    <td><?= implode(', ', json_decode($row[2]) ?? []) ?></td>
    <td><?= $row[4] ?></td>
    <td><?= $row[9] ?></td>
    <td><?= $row[12] ?></td>
    <td><a href="<?=$row[8]?>" target="_blank"><?= $row[8] ?></a></td>
    <td><?= $row[5] ?></td>
    <td><?= $row[6] ?></td>
    <td><?= $row[7] ?></td>
    <td><?= $row[10] ?></td>
    <td><?= $row[11] ? 'Jah' : '' ?></td>
</tr>
        
<?php
}
?>
        
    </tbody>
</table>
</div>
<?php if($num_pages > 1) { ?>
    <nav>
      <ul class="pagination justify-content-center">
        <?php for($i = 1; $i <= $num_pages; $i++) { ?>
            <li class="page-item"><a class="page-link" href="?q=<?=$search?>&valdkond=<?=$valdkond?>&p=<?=$i?>"><?=$i?></a></li>
        <?php } ?>
      </ul>
    </nav>
<?php } ?>

<?php
foot();
?> 