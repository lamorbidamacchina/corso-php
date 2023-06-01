<!-- Variabili e assegnamenti  -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esercizio 06</title>
</head>
<body>
  <h1>Variabili, assegnamenti, concatenazioni e manipolazioni di stringhe</h1>
  <p> (slide 26-32) di 02_PHPintro.pdf</p>

  <h2>Echo di variabili</h2>
  <?php 
      $x = 1;
      $y = 2;
  ?>
  <!-- echo di una stringa concatenata con la variabile -->
  <?php echo "Il valore della variabile x è uguale a ".$x;?><br>
  <!-- echo del solo valore della variabile, preceduto da testo inserito direttamente nell'html -->
  Il valore  della variabile y è uguale a <?php echo $y;?><br><br>

  <h2>Variabili copiate vs variabili referenziate</h2>
  <!-- variabili copiate vs variabili referenziate -->
  <?php 
  $a = "Pippo";
  $b = $a;
  $c = &$a;
  $a = "Pluto";
  ?>
  <?php echo "Il valore di a è: " .$a;?><br>
  <?php echo "Il valore di b, copia di a, è: " .$b;?><br>
  <?php echo "Il valore di c, reference di a, è: " .$c;?><br><br>


  <h2>Costanti</h2>
  <?php define("MY_CONST", "Hello");?>
  <?php echo MY_CONST;?><br><br>


  <h2>Operatori aritmetici</h2>
  <?php 
  $x = 1;
  $y = 2;
  $z = $x + $y;
  echo "z è uguale a ".$z . " (x + y)";
  ?><br><br>
  <?php 
  $x = 1;
  $y = 2;
  $z = $x - $y;
  echo "z è uguale a ".$z . " (x - y)";
  ?><br><br>
  <?php 
  $x = 1;
  $y = 2;
  $z = $x * $y;
  echo "z è uguale a ".$z . " (x * y)";
  ?><br><br>
  <?php 
  $x = 1;
  $y = 2;
  $z = $x / $y;
  echo "z è uguale a ".$z . " (x / y)";
  ?><br><br>
  <?php 
  $z = 3;
  $z++;
  echo "z è uguale a ".$z . " (z++)";
  ?><br><br>

  <h2>Concatenazione di stringhe</h2>
  <?php 
  $p = "Pippo";
  echo "Buongiorno ".$p . " (concatenazione classica con punto)";?><br>
  <?php 
  $p = "Pippo";
  echo "Buongiorno $p (concatenazione dentro ai doppi apici - interpreted string)";?><br>
  <?php 
  $p = "Pippo";
  echo 'Buongiorno $p (concatenazione dentro agli apici singoli - non funziona)';?><br>


<h2>Manipolazioni di stringhe</h2>
<?php 
  $a = "c'era una volta...";
  echo "La variabile a è: ".$a."<br>";
  $lunghezza_a = strlen($a);
  echo "La variabile a contiene ".$lunghezza_a ." caratteri";
?><br>
<?php
  $maiusc_a = strtoupper($a);
  echo "La variabile a tutta in maiuscolo: ".$maiusc_a;
?><br>
<?php
  $cerca = strpos($a,"r");
  echo "La lettera r è presente nella variabile a? Se sì, in quale posizione? ".$cerca;  
?><br>
<?php
  $cut = substr($a,0,5);
  echo "I primi 5 caratteri della variabile a sono: ". '"'.$cut.'"';  
?> 
<br>
<?php
  $a = str_replace("una volta", "un tempo", $a);
  echo "Se faccio una replace di 'una volta' con 'un tempo', la variabile a diventa: ". '"'.$a.'"';  
?> 

<h2>Commenti</h2>
<p>Vedi il file php aprendolo da VS Code per visualizzare i commenti</p>
<?php // questo è un commento su riga singola, e non viene visualizzato né in pagina html, né nel sorgente della pagina html ?>
<?php /* questo è un commento su righe multiple, 
      e non viene visualizzato né in pagina html, 
      né nel sorgente della pagina html */ 
?>
</body>
</html>