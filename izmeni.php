<?php 
	include("konekcija.php");
	if(!isset($_GET["id"])){
		header("Location:admin.php");
	}
	$id = $_GET["id"];
	$blog = $db->rawQuery("select * from blog b join tip t on b.tipID=t.tipID where blogID=".$id);
	$poruka = '';
	if(isset($_POST['izmeni'])) {
		include('blogKlasa.php');
		$blog = new Blog($db);
		$sacuvano = $blog->izmeni($id);
		if($sacuvano){
			$poruka= 'Uspesno izmenjeno';
		}else{
			$poruka= 'Neuspesno izmenjeno';
		}
		//header("Location: admin.php");
	}
 ?> 

<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body id="page-top" class="index">

    <?php include("menu.php"); ?>

    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Dobrodosli!</div>
                <div class="intro-heading">Drago nam je sto ste ovde</div>
                <a href="index.php" class="page-scroll btn btn-xl">Pogledajte vise</a>
            </div>
        </div>
    </header>

    <section id="trenerDanas">
        <div class="container">
		<h1>Izmena bloga</h1>
		
		<form id="forma" method="post" action="" role="form">
			<?php if($poruka != ''){ ?>
				<div class="well"><?php echo $poruka ?></div>
			<?php } ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="naslov">Naslov *</label>
						<input id="naslov" type="text" name="naslov" class="form-control" placeholder="Naslov *" value="<?php echo($blog[0]['naslov']); ?>" >
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="tipID">Izaberi tip:</label>
				<select class="form-control" id="tipID" name="tipID">
				<?php 
				$tipovi= $db->get("tip");
				$db->where("tipID",$blog[0]["tipID"]);
				$t = $db->getOne("tip");
				?>
					<option value="<?php echo($t['tipID']); ?>"><?php echo($t['nazivTipa']); ?></option>
				<?php
					foreach($tipovi as $tip):
				?>
					<option value="<?php echo($tip['tipID']); ?>"><?php echo($tip['nazivTipa']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="opis">Opis *</label>
						<input id="opis" type="text" name="opis" class="form-control" placeholder="Opis *" value="<?php echo($blog[0]['opis']); ?>" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label for="datum">Datum *</label>
						<input id="datum" type="text" name="datum" class="form-control datepicker" placeholder="Datum *" value="<?php echo($blog[0]['datum']); ?>" >
					</div>
				</div>
			</div>
							
			<div class="col-md-12">
				<input id="izmeni" name="izmeni" type="submit" class="btn btn-success" value="Izmeni blog">
			</div>
				
		</form> 
        </div>
    </section>
	
    <?php include("footer.php"); ?>
	
    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/trener.js"></script>
	<script src="js/picker.js"></script>
	<script src="js/picker.date.js"></script>

	<script>	
		$('.datepicker').pickadate({
			format: 'yyyy-mm-dd',
			formatSubmit: 'yyyy-mm-dd',
			hiddenPrefix: 'prefix__',
			hiddenSuffix: '__suffix'
		});
	</script>	
</body>

</html>
