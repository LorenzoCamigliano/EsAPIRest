<?php
	class Student {
		
		private $conn;
		private $table = "student";

		
		public $id;
		public $name;
		public $surname;
		public $sidi_code;
		public $tax_code;

		
		public function __construct($db){
			$this->conn = $db;
		}

		
		function read() {
			
			$query = "SELECT
						id, name, surname, sidi_code, tax_code
					FROM
						" . $this->table;

			$stmt = $this->conn->prepare($query);
			$stmt->execute();

			return $stmt;
		}

		
		function readOne() {
			
			$query = "SELECT
						id, name, surname, sidi_code, tax_code
					FROM
						" . $this->table . " s
					WHERE
						s.id = ?
					LIMIT
						1";

			$stmt = $this->conn->prepare( $query );
			$stmt->bindParam(1, $this->id);

			$stmt->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->id = $row['id'];
				$this->name = $row['name'];
				$this->surname = $row['surname'];
				$this->sidi_code = $row['sidi_code'];
				$this->tax_code = $row['tax_code'];
				
				break;
			}
		}

		
		function create() {
			
			$query = "INSERT INTO
						" . $this->table . "
					SET
						name=:name, surname=:surname, sidi_code=:sidi_code, tax_code=:tax_code";

			$stmt = $this->conn->prepare($query);

			$this->name=htmlspecialchars(strip_tags($this->name));
			$this->surname=htmlspecialchars(strip_tags($this->surname));
			$this->sidi_code=htmlspecialchars(strip_tags($this->sidi_code));
			$this->tax_code=htmlspecialchars(strip_tags($this->tax_code));

			$stmt->bindParam(":name", $this->name);
			$stmt->bindParam(":surname", $this->surname);
			$stmt->bindParam(":sidi_code", $this->sidi_code);
			$stmt->bindParam(":tax_code", $this->tax_code);

			if($stmt->execute())
				return true;
			
			return false;
		}

		
		function delete() {
			
			$query = "DELETE FROM " . $this->table . " WHERE id = ?";

			$stmt = $this->conn->prepare($query);
			$this->id=htmlspecialchars(strip_tags($this->id));
			$stmt->bindParam(1, $this->id);

			if($stmt->execute())
				return true;

			return false;
		}

		
		function update() {
			
			$query = "UPDATE
						" . $this->table . "
					SET
						name=:name, surname=:surname, sidi_code=:sidi_code, tax_code=:tax_code
					WHERE
						id=:id";

			$stmt = $this->conn->prepare($query);

			$this->id=htmlspecialchars(strip_tags($this->id));
			$this->name=htmlspecialchars(strip_tags($this->name));
			$this->surname=htmlspecialchars(strip_tags($this->surname));
			$this->sidi_code=htmlspecialchars(strip_tags($this->sidi_code));
			$this->tax_code=htmlspecialchars(strip_tags($this->tax_code));

			$stmt->bindParam(":id", $this->id);
			$stmt->bindParam(":name", $this->name);
			$stmt->bindParam(":surname", $this->surname);
			$stmt->bindParam(":sidi_code", $this->sidi_code);
			$stmt->bindParam(":tax_code", $this->tax_code);

			if($stmt->execute())
				return true;

			return false;
		}
	}
?><?php
class Student {
  
  private $conn;
  private $table = "student";

  
  public $id;
  public $name;
  public $surname;
  public $sidi_code;
  public $tax_code;

  
  public function __construct($db){
    $this->conn = $db;
  }

  
  function read() {
    
    $query = "SELECT
          id, name, surname, sidi_code, tax_code
        FROM
          " . $this->table;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt;
  }

  
  function readOne() {
    
    $query = "SELECT
          id, name, surname, sidi_code, tax_code
        FROM
          " . $this->table . " s
        WHERE
          s.id = ?
        LIMIT
          1";

    $stmt = $this->conn->prepare( $query );
    $stmt->bindParam(1, $this->id);

    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $this->id = $row['id'];
      $this->name = $row['name'];
      $this->surname = $row['surname'];
      $this->sidi_code = $row['sidi_code'];
      $this->tax_code = $row['tax_code'];
      
      break;
    }
  }

  
  function create() {
    
    $query = "INSERT INTO
          " . $this->table . "
        SET
          name=:name, surname=:surname, sidi_code=:sidi_code, tax_code=:tax_code";

    $stmt = $this->conn->prepare($query);

    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->surname=htmlspecialchars(strip_tags($this->surname));
    $this->sidi_code=htmlspecialchars(strip_tags($this->sidi_code));
    $this->tax_code=htmlspecialchars(strip_tags($this->tax_code));

    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":surname", $this->surname);
    $stmt->bindParam(":sidi_code", $this->sidi_code);
    $stmt->bindParam(":tax_code", $this->tax_code);

    if($stmt->execute())
      return true;
    
    return false;
  }

  
  function delete() {
    
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);
    $this->id=htmlspecialchars(strip_tags($this->id));
    $stmt->bindParam(1, $this->id);

    if($stmt->execute())
      return true;

    return false;
  }

  
  function update() {
    
    $query = "UPDATE
          " . $this->table . "
        SET
          name=:name, surname=:surname, sidi_code=:sidi_code, tax_code=:tax_code
        WHERE
          id=:id";

    $stmt = $this->conn->prepare($query);

    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->surname=htmlspecialchars(strip_tags($this->surname));
    $this->sidi_code=htmlspecialchars(strip_tags($this->sidi_code));
    $this->tax_code=htmlspecialchars(strip_tags($this->tax_code));

    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":surname", $this->surname);
    $stmt->bindParam(":sidi_code", $this->sidi_code);
    $stmt->bindParam(":tax_code", $this->tax_code);

    if($stmt->execute())
      return true;

    return false;
  }
}
?>
