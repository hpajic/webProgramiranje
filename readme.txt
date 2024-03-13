--konekcija na bazu---
unutar admin/includes/dbh.php
pravimo varijable servera i usernamea xmppa, šifre od xamppa te ime baze na phpmyadmin-
unutar nakon toga pravimo ime konekcije recimo $conn i dajemo mu sva 4 parametra pomocu mysqli_connect(1,2,3,4);

----add category---

unutar blog.category dohvacanje konekcije i dohvacanje svih podataka iz blog_category tablice iz baze ne dohvacanje svih redova tablice pomocu queria i mysqli_num_rows
na formu stavljamo POST i action dodjeljujemo za dinamicno dodavanje unutar add-category.php unutar include foldera

unutar add-category prvo provjeravamo preko isseta je li button pritisnut, i requireamo konekciju,
ako je actually pritisnut dohvacamo podatke pomocu POST-a postavljamo nove varijable za unesena polja,također postavljamo i datum i vrijeme
nakon sto smo dohvatili unesena polja unosimo podatke u bazu pomocu sql statemanta INSERT INTO
nakon toga pokrecemo query unutar if-a da nam vrati true ili false..ako dobro prode zatvaramo konekciju i upucujemo na =success,ukoliko nije upucujemo na =error

nakon toga ubacujemo unutar blog-category tablice sve categorije pomocu while loopa sve dok dohvaca podatke ispisuje, dohvacamo sve columne iz sql tablice 
imamo 3 dugmeta unutar tablice na blog categoriu,view,edit i delete...view povezujemo preko categoryPatha za svaku category...
edit button-unutar pop-upa pomocu id-a dohvacamo category koji zelimo promjeniti...pravimo formu koju povezujemo sa action="includes/edit-category.php"
i nakon toga za to pravimo edit-category.php unutar includesa...ponovno dohvacamo sva unesena polja ukoliko je
dugme stisnuto..i update-amo tablicu sa novim podatcima, ukoliko se query dobro odradio vracamo se nazad sa editcategory=success...ukoliko nije opet =error,
i opet pisemo succes i error message tipa 
    if(isset($_REQUEST['editcategory'])){
        if($_REQUEST['addcategory'] == "success"){
            echo "<div class='alert alert-success'><strog>Success</strong> Category Updated!</div>";
        }
        else if($_REQUEST['editcategory'] == "error"){
            echo "<div class='alert alert-danger'><strog>Error</strong> Category Was Not Updated!</div>";
        }
    }

nakon toga isto kao i za edit pravimo pop-up button i pmocu forme povezujemo ga sa action="includes/delete-category.php" i pravimo novi file unutar includes delete-category
ukoliko je btn stisnit pomocu category id-a dohvacamo odabranu category-u i pravimo sql statement za DELETE FROM blog_category WHERE n_category_id = id koji smo povezali,
pokrecemo query i ako je dobro prosao ponovno ispisujemo succes poruku za deletecategory


---write-a-blog----

dodajemo formu i povezujemo ju ponovo sa actionom...
nakon sto damo name svima iputima i povezemo categorye dinamicno pomocu while loopa..idemo u add-blog.php te tamo postavljamo isset na gumb za submitanje forme za dodavanje u bazu..
dohvacamo sve podatke koje dohvacamo...nakon toga provjeravamo jesu li sva polja unesena...te provjeravamo da blogpath nema nikakih razmaka..pravimo formError function koja $errorCode tj string koji je unutar zagrada od errora
baca nazad na write-a-blog---$errorCode, moramo jos provjeriti za home page placement ukoliko je odabran ponovo 1 da zamjeni onaj koji je bio izabran sa novim..
dodajemo u bazu pomocu sqlstatementa i querya
dodavanje slika unutar add blog-a..unutar jquerya provjeramo je li user unjeo sliku, tj. sliku sa odredenim tipom..dohvacamo sliku preko id-a i dohvacamo extension
ako je user unjeo sliku provjeramo je li njegov extension unutar naseg oznacenog extensiona...ukoliko nije postavljamo error..funkciju pozivamo unutar forme..nakon toga unutar
add-bloga uploadamo sliku preko imgUrl-a..preko imgType(alt ili main) provjeramoa je li slika prazna..strtolower dohvaca extension slike..ponovo provjeravamo je li slika dobar tip 
nakon toga dodajemo folder u kojega ubacujemo slike i dodajemo imgName pomocu randoma..dodajemo i path slike..vracamo imgUrl


upravljanje sessionima unutar add-bloga postavljamo session da nam sprema sto smo zapisali