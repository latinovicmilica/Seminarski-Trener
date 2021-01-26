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
                <div class="intro-lead-in"> Dobrodošli! </div>
                <div class="intro-heading">Drago nam je što ste ovde!</div>
                <a href="index.php#blogovi" class="page-scroll btn btn-xl"> Pogledajte neke od blogova</a>
            </div>
        </div>
    </header>

    <section id="blogovi">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Online trener</h2>
                    <h3 class="section-subheading text-muted">Ovde možete pronaći naše blogove</h3>
					
				</div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/slika5.jpg" class="demo">
                        <h2>10 aktivnosti za koje nauka tvrdi da će vas učiniti srećnijim</h2>
                        <p>Poruka u kojoj se zahvaljujete, trošenje na druge, slušanje muzike, srećno sanjarenje u budnom stanju…Nauka vas može učiniti srećnijim. 
                            Uradite bar neke od ovih aktivnosti danas i osećajte tok pozitivnih vibracija. Nastavite da to radite nedelju dana ili duže i osetite koliko vam se raspoloženje popravlja... 
                           
                    </div>
                    <div class="col-md-4">
                        <img src="img/slika6.jpg" class="demo">
                        <h2>Zašto je važno redovno treniranje?</h2>
                        <p> Kada tek započinjemo fizičku aktivnost veoma je važno da to radimo postepeno i na pravi način. Prve nedelje treninga možda će biti dovoljno dva do tri treninga, međutim kasnije minimalan broj treninga na koje bismo trebali da dolazimo nedeljno je tri. Da bismo postigli rezultat u smislu zdravlja i dobre forme, od presudne važnosti je redovno treniranje, odnosno pravovremeno smenjivanje inervala rada i intervala odmora.</p>
                    </div>
                    <div class="col-md-4">
                        <img src="img/slika7.jpg" class="demo">
                        <h2>Ovo su razlozi zašto vaše naporno treniranje ne daje očekivane rezultate</h2>
                        <p>Ako ne mršavite uz treninge, pre svega treba da se zapitate da li se zaista pravilno hranite, jer korigovanje ishrane zauzima 80 procenata borbe sa kilogramima.U danima kada radite treninge snage i rigoroznije vežbate, jedite više ugljenih hidrata (krompir, pirinač, žitarice), a kada odmarate ili radite kardio program, pokušajte da više unosite proteine i povrće, a ne mnogo skroba. Izbegavajte velike količine hleba, šećer i ostale obrađene hrane.</p>

                    </div>
                </div>
            </div>


            
        </div>
    </section>

    

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <script src="js/trener.js"></script>


</body>

</html>
