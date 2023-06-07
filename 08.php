<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esercizio 08</title>
</head>
<body>
  <h1>Funzioni</h1>

  <h2>Caso base</h2>
  <?php 
  // definizione della funzione
  function calcolaPrezzo($prezzoIntero,$percentualeSconto) {
    $risultato = $prezzoIntero - (($prezzoIntero * $percentualeSconto)/100);
    return $risultato;
  }
  ?>
  <?php 
  // invocazione (chiamata) della funzione
  $prezzoIntero = 100.0;
  $sconto = 10.0;
  $ris = calcolaPrezzo($prezzoIntero,$sconto);
  ?>

  <p>
    Prezzo intero: € <?php echo $prezzoIntero;?><br>
    Sconto: <?php echo $sconto."%";?><br>
    Prezzo scontato: € <?php echo $ris;?>
  </p>

  <?php 
  // invocazione (chiamata) della funzione
  $prezzoIntero = 90.0;
  $sconto = 20.0;
  $ris = calcolaPrezzo($prezzoIntero,$sconto);
  ?>
  <p>
    Prezzo intero: € <?php echo $prezzoIntero;?><br>
    Sconto: <?php echo $sconto."%";?><br>
    Prezzo scontato: € <?php echo $ris;?>
  </p>

  <h2>Caso con parametro opzionale</h2>
  <?php 
  // definizione della funzione
  function calcolaPrezzoBis($prezzoIntero,$percentualeSconto = 0.0) {
    $risultato = $prezzoIntero - (($prezzoIntero * $percentualeSconto)/100);
    return $risultato;
  }
  ?>
  <?php 
  // invocazione (chiamata) della funzione
  $prezzoIntero = 90.0;
  $ris = calcolaPrezzoBis($prezzoIntero);
  ?>
  <p>
    Prezzo intero: € <?php echo $prezzoIntero;?><br>
    Sconto: -<br>
    Prezzo scontato: € <?php echo $ris;?>
  </p>

  <h2>Funzioni con dichiarazione dei tipi dei parametri e del valore di ritorno (PHP 7)</h2>
  <?php
    function esempio1(string $a, int $b): bool {
      $ris = ($a == $b) ? true : false;
      return $ris; 
    } 
    
    function esempio2(string $a, int $b): bool { 
      $ris = ($a === $b) ? true : false;
      return $ris; 
    }
    
    function esempio3(array $a, int $b): bool { 
      $ris = ($a == $b) ? true : false;
      return $ris; 
    }
    

    var_dump(esempio1("2", 2));
    echo "<br>";
    var_dump(esempio2("2", 2));
    echo "<br>";
    var_dump(esempio3(array(2), 2));
    echo "<br>";
  ?>

  <h2>Funzioni con nullable</h2>
  <?php 
  // definizione della funzione
    function hi(?string $name): ?string {
      return $name ? 'Hello '.$name."<br>" : null;
    }
  // invocazione (chiamata) della funzione
  echo hi(null);
  echo hi('Enrico');
  ?>

  <h2>Visibilità delle variabili nelle funzioni (locale o globale)</h2>
  <?php 
  // definizione
  $cognome = "Eastwood";

  function completaNome() {
    global $cognome;
    $nome = "Clint"; #var locale 
    $nomeCompleto = "$nome $cognome";
    print $nomeCompleto;
  }
  echo "Il valore della variabile nome è: ".$nome. "<br>";
  echo "Il valore della variabile cognome è: ".$cognome. "<br>";
  completaNome();
  ?>
</body>
</html>