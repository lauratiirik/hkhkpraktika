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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    body {
        color: #566787;
        background: #f5f5f5;
		font-family: 'Roboto', sans-serif;
	}
	.table-wrapper {
        width: 1200px;
        background: #fff;
        padding: 20px 30px 5px;
        margin: 30px auto;
        box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
    }
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		min-width: 50px;
		border-radius: 2px;
		border: none;
		padding: 6px 12px;
		font-size: 95%;
		outline: none !important;
		height: 30px;
	}
    .table-title {
		border-bottom: 1px solid #e9e9e9;
		padding-bottom: 15px;
		margin-bottom: 5px;
		background: rgb(0, 50, 74);
		margin: -20px -31px 10px;
		padding: 15px 30px;
		color: #fff;
    }
    .table-title h2 {
		margin: 2px 0 0;
		font-size: 24px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 40px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table td a {
        color: #2196f3;
    }
	table.table td .btn.manage {
		padding: 2px 10px;
		background: #37BC9B;
		color: #fff;
		border-radius: 2px;
	}
	table.table td .btn.manage:hover {
		background: #2e9c81;
	}
</style>
<style>
.btn, .label {
    color: black;
}
.btn-koik {
    background-color: #FADBD8;
}
.btn-koik:hover {
    background-color: #F5B7B1 ;
}
.btn-koik:active, .btn-koik.active {
    background-color: #F1948A;
}
.btn-sotsiaal, .label-sotsiaal {
    background-color: #EBDEF0 ;
}
.btn-sotsiaal:hover {
    background-color: #D7BDE2 ;
}
.btn-sotsiaal:active, .btn-sotsiaal.active {
    background-color: #C39BD3;
}
.btn-majutus,.label-majutus {
    background-color: #D4E6F1 ;
}
.btn-majutus:hover {
    background-color: #A9CCE3 ;
}
.btn-majutus:active, .btn-majutus.active {
    background-color: #7FB3D5;
}
.btn-it, .label-it {
    background-color: #D1F2EB ;
}
.btn-it:hover {
    background-color: #A3E4D7 ;
}
.btn-it:active, .btn-it.active {
    background-color: #76D7C4;
}
.btn-puit, .label-puit {
    background-color: #FCF3CF ;
}
.btn-puit:hover {
    background-color: #F9E79F ;
}
.btn-puit:active, .btn-puit.active {
    background-color: #F7DC6F;
}
.btn-ehitus, .label-ehitus {
    background-color: #D5D8DC ;
}
.btn-ehitus:hover {
    background-color: #ABB2B9 ;
}
.btn-ehitus:active, .btn-ehitus.active {
    background-color: #808B96;
}
.btn-turism, .label-turism {
    background-color: #F2D7D5 ;
}
.btn-turism:hover {
    background-color: #E6B0AA ;
}
.btn-turism:active, .btn-turism.active {
    background-color: #D98880;
}
.btn-kontoritoo, .label-kontoritoo {
    background-color: #3498DB ;
}
.btn-kontoritoo:hover {
    background-color: #2E86C1 ;
}
.btn-kontoritoo:active, .btn-kontoritoo.active {
    background-color: #2874A6;
}
.btn-kasitoo, .label-kasitoo {
    background-color: #16A085 ;
}
.btn-kasitoo:hover {
    background-color: #138D75 ;
}
.btn-kasitoo:active, .btn-kasitoo.active {
    background-color: #117A65;
}

</style>
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