<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esercizio 07</title>
</head>
<body>
<h1>Operatori di confronto, operatori booleani, condizionali e cicli</h1>

<h2>Operatori di confronto e condizionali semplici</h2>
<p>
2 == 1?  
<?php  
$x = 2;
if ($x == 1) 
  {echo "Sì";} 
else 
  {echo "No";};
?>
</p>

<p>
1 == 1?  
<?php  
$x = 1;
if ($x  == 1) 
  {echo "Sì";} 
else 
  {echo "No";};
?>
</p>

<p>
1 != 1?  
<?php  
$x = 1;
if ($x  != 1) 
  {echo "Sì";} 
else 
  {echo "No";};
?>
</p>

<p>
2 != 1?  
<?php  
$x = 2;
if ($x  != 1) 
  {echo "Sì";} 
else 
  {echo "No";};
?>
</p>

<p>
1 === "1"?  
<?php  
$x = "1";
if ($x  === 1) 
  {echo "Sì";} 
else 
  {echo "No";};
?>
</p>

<p>
1 > 2?  
<?php  
$x = 1;
if ($x  > 2) 
  {echo "Sì";} 
else 
  {echo "No";};
?>
</p>


<h2>Operatori booleani</h2>
<p>Controllo se la variabile $x è maggiore di 4 e minore di 8. <br>
Per $x = 5: 
<?php 
$x = 5;
if ($x > 4 && $x < 8) {echo "Sì";} else {echo "No";}
?>
<br>
Per $x = 9: 
<?php 
$x = 9;
if ($x > 4 && $x < 8) {echo "Sì";} else {echo "No";}
?>
</p>

<p>Controllo se la variabile $x è minore di 4 oppure maggiore di 8. <br>
Per $x = 5: 
<?php 
$x = 5;
if ($x < 4 || $x > 8) {echo "Sì";} else {echo "No";}
?>
<br>
Per $x = 9: 
<?php 
$x = 9;
if ($x < 4 || $x > 8) {echo "Sì";} else {echo "No";}
?>
</p>

<p>Controllo se la variabile $x è minore di 4 oppure maggiore di 8, e poi verifico il contrario<br>
Per $x = 5: 
<?php 
$x = 5;
if (!($x < 4 || $x > 8)) {echo "Sì";} else {echo "No";}
?>
<br>
Per $x = 9: 
<?php 
$x = 9;
if (!($x < 4 || $x > 8)) {echo "Sì";} else {echo "No";}
?>
</p>

<h2>Condizionali</h2>
<p>
Se la variabile $var è uguale a "m", saluto in un modo, se è uguale a "f" saluto in un altro, altrimenti saluto in un altro modo ancora. <br>
<?php 
$var = "m";
// $var = $_GET["sex"];
echo "La variabile var è valorizzata a: <strong>".$var."</strong><br>";
if ($var == "m") {
  echo "Buongiorno, signore!";
} elseif ($var == "f") {
  echo "Buongiorno, signora!";
} else {
  echo "Buongiorno!";
}
?>
</p>

<h2>Cicli</h2>
<p>Creo un ciclo da 1 a 10, dove ad ogni loop stampo la parola Ciao! e vado a capo.
<br>
<?php 
for ($i=0; $i<10; $i++) {
  echo "Ciao!<br>";
}
?>
</p>

<p>Creo un ciclo da 1 a 10, dove ad ogni loop stampo la parola ciao seguita dal numero del ciclo e da un "!" alla fine, e vado a capo.
<br>
<?php 
$parola = "ciao";
for ($i=0; $i<10; $i++) {
  echo ucfirst($parola. " ".$i."!<br>");
}
?>
</p>

<p>Creo lo stesso ciclo di sopra, ma usando il costrutto "while" anziché "for"
<br>
<?php 
$parola = "ciao";
$i = 0;
while ($i<10) {
  echo ucfirst($parola. " ".$i."!<br>");
  $i++;
}
?>
</p>

<p>Creo lo stesso ciclo di sopra, ma usando il costrutto "while" anziché "for", e stampando tutto alla fine. Questo caso vi fa capire che una variabile creata all'interno di un ciclo, può essere usata anche al suo esterno (non esiste uno SCOPE per le variabili nei cicli)
<br>
<?php 
$parola = "ciao";
$i = 0;
while ($i<10) {
  $frase .= ucfirst($parola. " ".$i."!<br>");
  $i++;
}
echo $frase;
?>
</p>

<h2>Condizionali avanzati</h2>
<p>L'utilizzo dell'<strong>operatore ternario</strong> vi permette di avere una soluzione più compatta di un costrutto condizionale semplice if / else:

<pre>
  $count = 0;
  $ris = ($count>0) ? "Length=".$count : "Empty!";
</pre>
<?php 
$count = 0;
$ris = ($count>0) ?  "Length=".$count :  "Empty!";
echo $ris;
?>
</p>

<p>Il costrutto <strong>"switch"</strong> consente di gestire soluzioni con molte casistiche diverse</p>
In questo esempio valuto il contenuto della variabile $input in cui mi aspetto uno strunento di gioco e a seconda del contenuto stampo una riga diversa che presume quale sport sia collegato alla variabile $input.<br>

<?php 
$input = "pallone";
//$input = $_GET["tool"];
$frase = "";
switch ($input) {
  case "racchetta":
    $frase = "Il tuo sport probabilmente è il tennis";
    break;
  case "tavola":
    $frase = "Il tuo sport probabilmente è lo snowboard o il surf";
    break;
  case "pallone":
    $frase = "Il tuo sport potrebbe essere il calcio, il basket o la pallavolo";
    break;
  case "pallina":
    $frase = "Il tuo sport potrebbe essere il tennis o il golf";
    break;
  case "scarpe chiodate":
    $frase = "Il tuo sport potrebbe essere l'atletica";
    break;
  default:
    $frase = "Non ho idea di quale sport potrebbe essere...";
    break;
}
echo $frase;
?>

</body>
</html>