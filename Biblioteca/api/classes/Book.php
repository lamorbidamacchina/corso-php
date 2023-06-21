<?php
class Book {
	
	//connessione (inizializzata nel costruttore)
    private $conn;
 
    // proprietà dei prodotti
    public $id;
    public $titolo;
    public $autore;
    public $pagine;
    public $editore;
		public $anno;
		public $id_categoria;
		public $nome_categoria;
 
    // il construttore inizializza la variabile per la connessione al DB
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id_par) {
        $this->id = $id_par;
    }
    public function getTitolo() {
        return $this->titolo;
    }
    public function setTitolo($titolo_par) {
        $this->name = $titolo_par;
    }
    public function getAutore() {
        return $this->autore;
    }
    public function setAutore($autore_par) {
        $this->autore = $autore_par;
    }
    public function getIdCategoria(){
        return $this->id_categoria;
    }
    public function setIdCategoria($id_categoria_par) {
        $this->id_categoria = $id_categoria_par;
    }
		public function getPagine(){
			return $this->pagine;
		}
		public function setPagine($pagine_par) {
				$this->pagine = $pagine_par;
		}
		public function getEditore(){
			return $this->editore;
		}
		public function setEditore($editore_par) {
				$this->editore = $editore_par;
		}
		public function getAnno(){
			return $this->anno;
		}
		public function setAnno($anno_par) {
				$this->anno = $anno_par;
		}
    public function getNomeCategoria(){
        return $this->nome_categoria;
    }
    public function setCategory_name($nome_categoria_par) {
        $this->nome_categoria = $nome_categoria_par;
    }

	// servizio di lettura di tutti i prodotti
	function read() {
		// estraggo tutti i prodotti 
		$query = "SELECT * FROM libri JOIN categorie ON libri.id_categoria = categorie.idcat ORDER BY libri.titolo;";
		// preparo la query
		$stmt = $this->conn->prepare($query); 
		// eseguo la query
		$stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query (in questo caso un recordset)

		return $stmt; 
	}

	// servizio di lettura dei dati di un prodotto, dato il suo id
	function readOne() {
		// estraggo il prodotto con l'id indicato
		$query = "SELECT * FROM libri JOIN categorie ON libri.id_categoria = categorie.id WHERE libri.idcat = ?";
		// preparo la query
		$stmt = $this->conn->prepare($query);
		// invio il valore per il parametro
		$stmt->bindParam(1, $this->id);
		// eseguo la query
		$stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query (in questo caso un recordset con un solo elemento)

		// leggo la prima (e unica) riga del risultato della query
		$row = $stmt->fetch(PDO::FETCH_ASSOC); // la funzione fetch (libreria PDO) con parametro PDO::FETCH_ASSOC invocata su un PDOStatement, restituisce un record ($row), in particolare un array le cui chiavi sono i nomi delle colonne della tabella 
 
		if ($row) {
			// inserisco i valori nelle variabili d'istanza 
			$this->titolo = $row['titolo'];
			$this->autore = $row['autore'];
			$this->pagine = $row['pagine'];
			$this->editore = $row['editore'];
			$this->anno = $row['anno'];
			$this->id_categoria = $row['idcat'];
			$this->nome_categoria = $row['nomecat'];
		}
		else {
			// se non trovo il prodotto, imposto i valori delle variabili d'istanza a null
			$this->titolo = null;
			$this->autore = null;
			$this->pagine = null;
			$this->editore = null;
			$this->anno = null;
			$this->id_categoria = null;
			$this->nome_categoria = null;
		}
		
		// la funzione readOne non restituisce un risultato, bensì modifica l'oggetto su cui viene invocata (cioè il prodotto)
	}

	// servizio di inserimento di un nuovo prodotto
	function create() {
		// inserisco il nuovo prodotto
		$query = "INSERT INTO libri SET
				  titolo=:titolo, autore=:autore, editore=:editore, id_categoria=:id_categoria, pagine=:pagine, anno:=anno";
		// preparo la query
		$stmt = $this->conn->prepare($query);

		// invio i valori per i parametri (NB i valori del nuovo prodotto sono nelle variabili d'istanza!!)
		$stmt->bindParam(":titolo", $this->titolo);
		$stmt->bindParam(":autore", $this->autore);
		$stmt->bindParam(":id_categoria", $this->id_categoria);
		$stmt->bindParam(":pagine", $this->pagine);
		$stmt->bindParam(":editore", $this->editore);
		$stmt->bindParam(":anno", $this->anno);
 
		// eseguo la query
		$stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query

		return $stmt;		
	}

	// servizio di aggiornamento dei dati di un prodotto
	function update() {
		// aggiorno i dati del prodotto con l'id indicato
		$query = "UPDATE libri SET
					titolo = :titolo,
					autore = :autore,
					id_categoria = :id_categoria,
					pagine = :pagine,
					editore = :editore,
					anno = :anno
					WHERE
					id = :id";
	
		// preparo la query
		$stmt = $this->conn->prepare($query);
 
		// invio i valori per i parametri (NB i nuovi valori del prodotto sono nelle variabili d'istanza!!)
		$stmt->bindParam(':titolo', $this->titolo);
		$stmt->bindParam(':autore', $this->autore);
		$stmt->bindParam(':id_categoria', $this->id_categoria);
		$stmt->bindParam(':pagine', $this->pagine);
		$stmt->bindParam(':editore', $this->editore);
		$stmt->bindParam(':anno', $this->anno);
		$stmt->bindParam(':id', $this->id);
 
		// eseguo la query
		$stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query

		return $stmt;
	}

	// servizio di cancellazione di un prodotto
	function delete() {
		// cancello il prodotto con l'id indicato
		$query = "DELETE FROM libri WHERE id = ?";
	
		// preparo la query
		$stmt = $this->conn->prepare($query);
	
		// invio il valore per il parametro
		$stmt->bindParam(1, $this->id);

		// eseguo la query
		$stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query

		return $stmt;
	}

	// servizio di ricerca prodotti per keyword
	function search($keywords) {
		// cerco i prodotti 
		$query = "SELECT * FROM libri JOIN categorie ON libri.id_categoria = categorie.idcat
				  WHERE libri.titolo LIKE ? OR libri.autore LIKE ? OR categorie.nomecat LIKE ?
				  ORDER BY libri.titolo;";
		
		// preparo la query
		$stmt = $this->conn->prepare($query); 

		// aggiungo % prima e dopo le keywords per estrarre i testi che CONTENGONO le keywords (rif. SQL)
		$keywords = "%{$keywords}%"; 
	
		// invio i valori per i parametri
		$stmt->bindParam(1, $keywords);
		$stmt->bindParam(2, $keywords);
		$stmt->bindParam(3, $keywords);
 
		// eseguo la query
		$stmt->execute(); // NB $stmt conterrà il risultato dell'esecuzione della query (in questo caso un recordset)
	
		return $stmt;
	}	
}
?>