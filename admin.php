<?php
	include("konekcija.php");
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body id="page-top" class="index">

    <?php include("menu.php"); ?>

    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Dobrodošli!</div>
                <div class="intro-heading">Hoćete da ubacite novog trenera ili blog?</div>
                <a href="admin.php#trenerDanas" class="page-scroll btn btn-xl">Dodaj</a>
            </div>
        </div>
    </header>

    <section id="trenerDanas">
        <div class="container">
			<h3>Ubaci novi blog <a href="noviBlog.php"> <i class="fa fa-plus"></i></a></h3>
			<hr>
			<div class="form-group">
				<label for="znak">Izaberi tip bloga:</label>
				<select class="form-control" id="tip" onchange="generisiTabeluAdmin()">
					<option value="0"> ----- Svi tipovi ----- </option>
				<?php $tipovi= $db->get("tip");
					foreach($tipovi as $tip):
				?>
					<option value="<?php echo($tip['tipID']); ?>"><?php echo($tip['nazivTipa']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div id="output"></div>
			<br>
			<hr>
			<h1>Unos trenera</h1>
			<form id="forma" method="post" action="upload.php" role="form" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="ime">Ime i prezime:</label>
							<input id="ime" type="text" name="ime" class="form-control" placeholder="Ime i prezime *" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="grad">Grad:</label>
							<input id="grad" type="text" name="grad" class="form-control" placeholder="Grad *" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
			        <label for="file" class="cols-sm-2 control-label">Slika:</label>
			          <input type="file" class="form-control" name="file" placeholder="Slika"/>
			      </div>
					</div>
				</div>
	      <div class="form-group ">
	        <input type="submit" name="file" class="btn btn-danger btn-lg " value="Ubaci">
	      </div>
			</form>
    </div>
    </section>

  

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/trener.js"></script>

	<script>

		function generisiTabeluAdmin(){

			var tip = $("#tip").val();
			$.ajax({
				url: "generisiTabelu.php",
				data: "tip="+tip,
				success: function(result){
				var output = '<table class="table table-hover"><thead><tr><th>Naslov</th><th>Tip</th><th>Datum</th><th>Opis</th><th>Izmeni</th><th>Obrisi</th></tr></thead><tbody>';
				$.each($.parseJSON(result), function(i, val) {
					output += '<tr>';
					output += '<td>'+val.naslov+'</td>';
					output += '<td>'+val.nazivTipa+'</td>';
					output += '<td>'+val.datum+'</td>';
					output += '<td>'+val.opis+'</td>';
					output += '<td><a href="izmeni.php?id='+val.blogID+'"><i class="fa fa-pencil"></i></a></td>';
					output += '<td><a href="obrisi.php?id='+val.blogID+'"><i class="fa fa-remove"></i></a></td>';
					output += '</tr>';

					});

					output+='</tbody></table>';
					$('#output').html(output);
			}});
		}

</script>
<script>
		$( document ).ready(function() {
			generisiTabeluAdmin();
		});
</script>

</body>

</html>
