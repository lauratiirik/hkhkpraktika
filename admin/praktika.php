<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require './template.php';
require './db.php';


require 'auth.php';

$conn = db_connect();
$error = '';
if (isset($_POST['submit'])) {
  if (!empty($_GET['id'])) {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM praktika_ettevotted WHERE Nimi = ? AND id <> ?");
    $stmt->bind_param('si', $_POST['nimi'], $_GET['id']);
  } else {
    $stmt = $conn->prepare("SELECT COUNT(*) FROM praktika_ettevotted WHERE Nimi = ?");
    $stmt->bind_param('s', $_POST['nimi']);
  }
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_row();
  if ($row[0] > 0) {
    $error = 'Selline ettevõte on juba olemas.';
  } else {
    $registrikood = $_POST['registrikood'] ?? '';
    $juhendaja = $_POST['juhendaja'] ?? '';
    $epost = $_POST['epost'] ?? '';
    $telefoninumber = $_POST['telefoninumber'] ?? '';
    $uldtelefon = $_POST['uldtelefon'] ?? '';
    $koduleht = $_POST['koduleht'] ?? '';
    $uldkontakt = $_POST['uldkontakt'] ?? '';
    $lisainfo = $_POST['lisainfo'] ?? '';
    $tunnustamine = $_POST['tunnustamine'] === 'yes' ? 1 : 0;
    $valdkond = json_encode($_POST['valdkond'] ?? []);
    if (!empty($_GET['id'])) {
      $stmt = $conn->prepare("UPDATE praktika_ettevotted SET Nimi = ?, Valdkond = ?, Registrikood = ?, Aadress = ?, Juhendaja = ?, Epost = ?, Telefoninumber = ?, Uldtelefon = ?, Koduleht = ?, Uldkontakt = ?, Lisainfo = ?, Tunnustamine = ? WHERE id = ?");
      $stmt->bind_param('sssssssssssii', $_POST['nimi'], $valdkond, $registrikood, $_POST['aadress'], $juhendaja, $epost, $telefoninumber, $uldtelefon, $koduleht, $uldkontakt, $lisainfo, $tunnustamine, $_GET['id']);
      $stmt->execute();
    } else {
      $stmt = $conn->prepare("INSERT INTO praktika_ettevotted (Nimi, Valdkond, Registrikood, Aadress, Juhendaja, Epost, Telefoninumber, Uldtelefon, Koduleht, Uldkontakt, Lisainfo, Tunnustamine) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
      $stmt->bind_param('sssssssssssi', $_POST['nimi'], $valdkond, $registrikood, $_POST['aadress'], $juhendaja, $epost, $telefoninumber, $uldtelefon, $koduleht, $uldkontakt, $lisainfo, $tunnustamine);
      $stmt->execute();

    }
    header('Location: index.php');
    exit();
  }
} else if (isset($_POST['delete'])) {
  $stmt = $conn->prepare("DELETE FROM praktika_ettevotted WHERE id = ?");
  $stmt->bind_param('i', $_GET['id']);
  $stmt->execute();
  header('Location: index.php');
  exit();
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("select * from praktika_ettevotted where id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $praktika = $result->fetch_object();  
} else {
    $praktika = (object)[
      'id' => null,
      'Valdkond' => '[]',
      'Nimi' => '',
      'Registrikood' => '',
      'Aadress' => '',
      'Juhendaja' => '',
      'Epost' => '',
      'Telefoninumber' => '',
      'Uldtelefon' => '',
      'Koduleht' => '',
      'Uldkontakt' => '',
      'Lisainfo' => '',
      'Tunnustamine' => 0,
    ];
}

$valdkond = json_decode($praktika->Valdkond) ?? [];


head();
echo $error;
?>
<form method="POST" class="mb-5">
  <div class="form-group">
    <label for="nimi">Ettevõtte nimi</label>
    <input type="text" class="form-control" id="nimi" name="nimi" value="<?=$praktika->Nimi?>" required>
  </div>
  <div class="form-group">
    <label for="valdkond">Valdkond</label>
    <select class="form-control" id="valdkond" name="valdkond[]" multiple>
      <option <?=in_array('Sotsiaalhooldus', $valdkond) ? 'selected' : ''?>>Sotsiaalhooldus</option>
      <option <?=in_array('Majutus- ja toitlustusteenindus', $valdkond) ? 'selected' : ''?>>Majutus- ja toitlustusteenindus</option>
      <option <?=in_array('IT', $valdkond) ? 'selected' : ''?>>IT</option>
      <option <?=in_array('Puit', $valdkond) ? 'selected' : ''?>>Puit</option>
      <option <?=in_array('Ehitus', $valdkond) ? 'selected' : ''?>>Ehitus</option>
      <option <?=in_array('Turism', $valdkond) ? 'selected' : ''?>>Turism</option>
      <option <?=in_array('Kontoritöö', $valdkond) ? 'selected' : ''?>>Kontoritöö</option>
      <option <?=in_array('Käsitöö', $valdkond) ? 'selected' : ''?>>Käsitöö</option>
    </select>
  </div>
  <?php if($_SESSION['user']->Admin == 1) { ?>
  <div class="form-group">
    <label for="registrikood">Registrikood</label>
    <input type="text" class="form-control" id="registrikood" name="registrikood" value="<?=$praktika->Registrikood?>">
  </div>
  <?php } else { ?>
    <input type="hidden"name="registrikood" value="<?=$praktika->Registrikood?>">
  <?php } ?>
  <div class="form-group">
    <label for="aadress">Aadress</label>
    <input type="text" class="form-control" id="aadress" name="aadress" value="<?=$praktika->Aadress?>" required>
  </div>
  <div class="form-group">
    <label for="juhendaja">Juhendaja</label>
    <input type="text" class="form-control" id="juhendaja" name="juhendaja" value="<?=$praktika->Juhendaja?>">
  </div>
  <div class="form-group">
    <label for="epost">E-Post</label>
    <input type="email" class="form-control" id="epost" name="epost" value="<?=$praktika->Epost?>">
  </div>
  <div class="form-group">
    <label for="telefoninumber">Telefoninumber</label>
    <input type="text" class="form-control" id="telefoninumber" name="telefoninumber" value="<?=$praktika->Telefoninumber?>">
  </div>
  <div class="form-group">
    <label for="uldtelefon">Uldtelefon</label>
    <input type="text" class="form-control" id="uldtelefon" name="uldtelefon" value="<?=$praktika->Uldtelefon?>">
  </div>
  <div class="form-group">
    <label for="koduleht">Koduleht</label>
    <input type="text" class="form-control" id="koduleht" name="koduleht" value="<?=$praktika->Koduleht?>">
  </div>
  <div class="form-group">
    <label for="uldkontakt">Üldkontakt</label>
    <input type="text" class="form-control" id="uldkontakt" name="uldkontakt" value="<?=$praktika->Uldkontakt?>">
  </div>
  <div class="form-group">
    <label for="lisainfo">Lisainfo</label>
    <textarea class="form-control" id="lisainfo" name="lisainfo"><?=$praktika->Lisainfo?></textarea>
  </div>
  <div class="form-group">
    <label for="tunnustamine">Tunnustatud</label>
    <select class="form-control" id="tunnustamine" name="tunnustamine">
      <option <?=$praktika->Tunnustamine === 1 ? 'selected' : ''?> value="yes">Jah</option>
      <option <?=$praktika->Tunnustamine === 0 ? 'selected' : ''?> value="no">Ei</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Mine</button>
  <?php 
  if (isset($_GET['id'])) {
  ?>
  <button type="submit" form="delete-form" class="btn btn-danger float-right" name="delete">Kustuta</button>
  <?php } ?>
</form>
<form id="delete-form" method="POST" onsubmit="return confirm('kustuta?');"></form>




<?php
foot();
?>