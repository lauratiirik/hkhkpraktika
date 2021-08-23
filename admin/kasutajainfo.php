<?php
require 'template.php';
require 'db.php';

require 'auth.php';

require_admin();

$conn = db_connect();


if (isset($_POST['submit'])) {
  if (!empty($_GET['id'])) {
    if (empty($_POST['parool'])) {
      $stmt = $conn->prepare("UPDATE praktika_kasutajad SET Nimi = ?, Kasutaja = ?, Admin = ? WHERE id = ?");
      $stmt->bind_param('ssii', $_POST['nimi'], $_POST['kasutaja'], $_POST['admin'], $_GET['id']);
      $stmt->execute();
    } else {
      $stmt = $conn->prepare("UPDATE praktika_kasutajad SET Nimi = ?, Kasutaja = ?, Parool = ?, Admin = ? WHERE id = ?");
      $hash = password_hash($_POST['parool'], PASSWORD_DEFAULT);
      $stmt->bind_param('sssii', $_POST['nimi'], $_POST['kasutaja'], $hash, $_POST['admin'], $_GET['id']);
      $stmt->execute();
    }
  } else {
    $stmt = $conn->prepare("INSERT INTO praktika_kasutajad (Nimi, Kasutaja, Parool, Admin) VALUES (?,?,?,?)");
    $hash = password_hash($_POST['parool'], PASSWORD_DEFAULT);
    $stmt->bind_param('sssi', $_POST['nimi'], $_POST['kasutaja'], $hash, $_POST['admin']);
    $stmt->execute();
    header('Location: kasutajad.php');
    exit();
  }
} else if (isset($_POST['delete']) && $_GET['id'] != $_SESSION['user']->id) {
  $stmt = $conn->prepare("DELETE FROM praktika_kasutajad WHERE id = ?");
  $stmt->bind_param('i', $_GET['id']);
  $stmt->execute();
  header('Location: kasutajad.php');
  exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conn->prepare("select Nimi, Kasutaja, Admin from praktika_kasutajad where id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $kasutaja = $result->fetch_object();  
} else {
    $kasutaja = (object)[
      'Nimi' => '',
      'Kasutaja' => '',
      'Admin' => 0
    ];
}


head();
?>
<form method="POST">
  <div class="form-group">
    <label for="nimi">Nimi</label>
    <input type="text" class="form-control" id="nimi" name="nimi" value="<?=$kasutaja->Nimi?>" required>
  </div>
  <div class="form-group">
    <label for="kasutaja">Kasutaja</label>
    <input type="text" class="form-control" id="kasutaja" name="kasutaja" value="<?=$kasutaja->Kasutaja?>" required>
  </div>
  <div class="form-group">
    <label for="parool">Parool</label>
    <input type="password" class="form-control" id="parool" name="parool" value="" <?=isset($id)?'':'required'?>>
  </div>
  <div class="form-group mb-3">
    <label for="admin">Admin</label>
    <select class="custom-select" id="admin" name="admin">
      <option <?=$kasutaja->Admin == 1 ? 'selected' : ''?> value="1">JAH</option>
      <option <?=$kasutaja->Admin == 0 ? 'selected' : ''?> value="0">EI</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Mine</button>
  <?php 
  if (isset($_GET['id']) && $_GET['id'] != $_SESSION['user']->id) {
  ?>
  <button type="submit" form="delete-form" class="btn btn-danger float-right" name="delete">Kustuta</button>
  <?php } ?>
</form>

<script>
  var paroolEl = document.getElementById('parool');
  function checkPassword() {
    var parool = paroolEl.value;
    console.log(paroolEl, parool);
    if (parool.length > 0) {
      var ok = /[A-Z]/.test(parool) && /[0-9]/.test(parool);
      console.log(ok);
      if (!ok) {
        paroolEl.setCustomValidity("Parool peab sisaldama vähemalt ühte suurt tähte ja numbrit")
      } else {
        paroolEl.setCustomValidity("")
      }
    } else {
      paroolEl.setCustomValidity("");
    }
  }
  paroolEl.addEventListener('input', checkPassword);
</script> 
<form id="delete-form" method="POST" onsubmit="return confirm('kustuta?');"></form>


<?php
foot();
?>