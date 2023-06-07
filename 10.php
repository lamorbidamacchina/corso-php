<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Esercizio 10</title>
</head>
<body>
  <h1>Array</h1>

  <h2>Array a indice</h2>
  <p>Basi</p>
  <?php 
    $lista = array();
    $lista = array("pippo", "pluto", "minnie");
    // $lista = ["pippo", "pluto", "minnie"];
    $lista[3] = "etaBeta";
    $elem = $lista[3];
    echo "<pre>";
    print_r($lista);
    echo "</pre>";
    echo "<br>";
    echo "L'elemento con indice 3 della lista è: ".$elem;
  ?>

  <p>Aggiunta di elementi</p>
  <?php 
  array_push($lista, "paperino");
  $lista[] = "gastone";
  echo "<pre>";
  print_r($lista);
  echo "</pre>";
  ?>

  <p>Conteggio degli elementi con count()</p>
  La lista al momento contiene <?php echo count($lista);?> elementi.

  <p>Rimozione di un elemento con unset()</p>
  <?php unset($lista[3]);?>
  <?php 
  echo "<pre>";
  print_r($lista);
  echo "</pre>";
  $lista[3] = "eta beta";
  ?>

  <p>Verifica dell'esistenza di un elemento in una lista con in_array()</p>
  <?php 
    $check = in_array("pippo", $lista);
    if ($check) {
      echo "Pippo è nella lista";
    } else {
      echo "Pippo non è nella lista";
    }
  echo "<br>";
  ?>

  <p>Ciclare gli array con for</p>
  <ul>
    <?php for ($i=0; $i < count($lista); $i++) { ?>
      <li><?php echo $lista[$i]?></li>
    <?php } ?>
  </ul>

  <p>Ciclare gli array con foreach</p>
  <ul>
    <?php foreach ($lista as $personaggio) { ?>
      <li><?php echo $personaggio;?></li>
    <?php } ?>
  </ul>


  <h2>Array a chiave (associativi)</h2>
  <p>Creazione base</p>
  <?php 
  $cliente = array(
    "nome" => "anna", 
    "cognome" => "goy",
    "citta" => "milano"
  );
  $cliente["nome"] = "marta";
  $cliente["telefono"] = "328932898";
  echo "<pre>";
  print_r($cliente);
  echo "</pre>";
  ?>

  <p>Ciclare un array associativo con foreach</p>
  <ul>
  <?php 
  foreach($cliente as $dato=>$valore) {
    echo "<li>".$dato.": ".$valore."</li>";
  }
  ?>
  </ul>

  <p>Array multidimensionali</p>
  <?php 
  $cliente = array(
    "id" => 12390138,
    "nome" => "anna", 
    "cognome" => "goy",
    "residenza" => array(
      "indirizzo" => "via magenta",
      "civico" => "10",
      "citta" => "milano"
    ),
    "domicilio" => array(
      "indirizzo" => "via po",
      "civico" => "22",
      "citta" => "torino"
    )
  );
  echo "<pre>";
  print_r($cliente);
  echo "</pre>";
  ?>

</body>
</html>