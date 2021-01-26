<?php
	include("konekcija.php");

	$sort='order by t.tipID asc';

	if(isset($_GET['sort'])){
		if($_GET['sort']=='rastuce'){
			$sort='order by t.tipID asc';
		}
		if($_GET['sort']=='opadajuce'){
			$sort='order by t.tipID desc';
		}
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
                <div class="intro-lead-in">Dobrodošli!</div>
                <div class="intro-heading">Drago nam je što ste ovde!</div>
                <a href="vizuelizacija.php#trenerDanas" class="page-scroll btn btn-xl">Pogledajte blogove</a>
            </div>
        </div>
    </header>
    <section id="trenerDanas">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Razonoda</h2>
                    <h3 class="section-subheading text-muted">Ovde možete pronaći neke zanimljive teme, a možete i okaćiti blog koji je Vama interesantan!</h3>
					<h3> Sortiranje blogova</h3>
					<a href='blogovi.php?sort=rastuce'>Ljubav-Top10-Testovi-Razno</a><br>
					<a href='blogovi.php?sort=opadajuce'>Razno-Testovi-Top10-Ljubav</a>
				</div>
            </div>
            <div class="row text-center">

				<?php
					$blogovi = $db->rawQuery("select * from blog b join tip t on b.tipID=t.tipID ".$sort);
					//var_dump($blogovi);
					foreach($blogovi as $blog):
				?>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-<?php echo($blog['slikica']); ?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?php echo($blog['naslov']); ?></h4>
					<p><?php echo($blog['nazivTipa']); ?></p>
					<p class="text-muted"><?php echo($blog['opis']); ?></p>
					<p><?php echo($blog['datum']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/trener.js"></script>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>

		<script type="text/javascript">
		  google.load('visualization', '1', {'packages':['corechart']});
		  google.setOnLoadCallback(grafik);

		  function grafik() {
		    var jsonData = $.ajax({
		    url: "podaciVizuelizacija.php",
		    dataType:"json",
		    async: false
		  }).responseText;
		  var data = new google.visualization.DataTable(jsonData);
		  var options = {'title':'Broj blogova po tipu',
		   backgroundColor: { fill:'transparent' },
		    titleTextStyle: {
		  textAlign: 'center',
		      color: 'black',
		      fontSize: 36},
		      'width':1200,
		      'height':800,
		      is3D:true,
		  legend: {
		      textStyle: {
		    color: 'black'
		      }
		  },
		  };

		  var chart = new google.visualization.PieChart(document.getElementById('podaci'));


		  chart.draw(data,  options);

		}
		</script>

</body>

</html>
