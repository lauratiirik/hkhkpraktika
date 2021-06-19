<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>HKHK Praktikaettevõtted</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto%7CVarela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="style.css" />
<script>
$(document).ready(function(){
	$(".btn-group .btn").click(function(){
		var inputValue = $(this).find("input").val();
		if(inputValue != 'all'){
			var target = $('table tr[data-status*=":' + inputValue + ':"]');
			$("table tbody tr").not(target).hide();
			target.fadeIn();
		} else {
			$("table tbody tr").fadeIn();
		}
	});
	// Changing the class of status label to support Bootstrap 4
    var bs = $.fn.tooltip.Constructor.VERSION;
    var str = bs.split(".");
    if(str[0] == 4){
        $(".label").each(function(){
        	var classStr = $(this).attr("class");
            var newClassStr = classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});
</script>
</head>
<body>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-3"><h2>HKHK Praktikaettevõtted</h2></div>
                <div class="col-sm-9">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-koik active">
                            <input type="radio" name="status" value="all" checked="checked"> Kõik
                        </label>
                        <label class="btn btn-sotsiaal" title="Hooldustöötaja, Tegevusjuhendaja, Lapsehoidja">
                            <input type="radio" name="status" value="Sotsiaalhooldus"> Sotsiaalhooldus
                        </label>
                        <label class="btn btn-majutus" title="Kokk, Pagar, Puhastusteenindaja, Turismiettevõtte teenindaja, Toitlustuskorraldaja">
                            <input type="radio" name="status" value="Majutus- ja toitlustusteenindus"> Majutus- ja toitlustusteenindus
                        </label>
                        <label class="btn btn-it">
                            <input type="radio" name="status" value="IT"> IT
                        </label>
                        <label class="btn btn-puit">
                            <input type="radio" name="status" value="Puit"> Puit
                        </label>
                        <label class="btn btn-ehitus">
                            <input type="radio" name="status" value="Ehitus"> Ehitus
                        </label>
                        <label class="btn btn-turism" title="Loodusgiid">
                            <input type="radio" name="status" value="Turism"> Turism
                        </label>
                        <label class="btn btn-kontoritoo" title="Bürootöötaja, Raamatupidaja">
                            <input type="radio" name="status" value="Kontoritöö"> Kontoritöö
                        </label>
                        <label class="btn btn-kasitoo">
                            <input type="radio" name="status" value="Käsitöö"> Käsitöö
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Ettevõtte nimi</th>
                    <th>Registrikood</th>
                    <th>Valdkond</th>
                    <th>Aadress</th>
                    <th>Kontakt</th>
                    <th>Üldtelefon</th>
                    <th>Tunnustatud</th>
                </tr>
            </thead>
            <tbody>

    <?php
        $conn = mysqli_connect("localhost","ltiirik","Bv08Wx/0anAgp+O5","ltiirik");
        if(!$conn){
        die("DB ERROR!");
        }
                
        mysqli_set_charset ($conn, "utf8");
        $query = "SELECT Nimi, Koduleht, Registrikood, Valdkond, Aadress, Uldkontakt, Uldtelefon, Tunnustamine FROM praktika_ettevotted";
        $results = mysqli_query ($conn, $query);  
        while ($row = mysqli_fetch_row($results)){
        
    ?>

<tr data-status="<?=implode(' ', array_map(function($v){return ":$v:";}, array_filter(json_decode($row[3]) ?? [])))?>">
    <td><a target="_blank" href="<?=$row[1]?>"><?= $row[0]; ?></a></td>
    <td><?= $row[2]; ?></td>
    <td><?php foreach(json_decode($row[3]) ?? [] as $valdkond) {
            if (empty($valdkond)) continue; ?>
            <span class="label
                <?php switch ($valdkond) {
                    case 'Sotsiaalhooldus': echo 'label-sotsiaal" title="Hooldustöötaja, Tegevusjuhendaja, Lapsehoidja"';break;
                    case 'Turism': echo 'label-turism" title="Loodusgiid"';break;
                    case 'Kontoritöö': echo 'label-kontoritoo" title="Bürootöötaja, Raamatupidaja"';break;
                    case 'Majutus- ja toitlustusteenindus': echo 'label-majutus" title="Kokk, Pagar, Puhastusteenindaja, Turismiettevõtte teenindaja, Toitlustuskorraldaja"';break;
                    case 'IT': echo 'label-it"';break;
                    case 'Käsitöö': echo 'label-kasitoo"';break;
                    case 'Ehitus': echo 'label-ehitus"';break;
                    case 'Puit': echo 'label-puit"';break;
                } ?>

            ><?= $valdkond ?></span>
        <?php } ?>
    </td>
    <td><?= $row[4]; ?></td>
    <td><?= $row[5]; ?></td>
    <td><?= $row[6]; ?></td>
    <td><?= $row[7] ? 'Jah' : '' ?></td>
</tr>
                
             <?php
        }
                
            ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>