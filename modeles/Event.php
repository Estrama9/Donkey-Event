<?php
//require_once "../modeles/Base.php";
require_once __DIR__ . '/Base.php';

interface EventOperation {
    public function create($date, $name, $price, $max_places);
    public function read($id);
    public function update($date, $name, $price, $max_places, $id);
    public function delete($id);           
    public function display();
    
};

class Event extends Base implements EventOperation {

    public function create($date, $name, $price, $max_places) {

        $sql = "INSERT INTO events_List (date, name, price, max_places) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);

    try {
        $stmt->execute([$date, $name, $price, $max_places]);
        header('Location: ../index.php');
        exit;
    } catch (PDOException $e) {
        echo "<p>" . '❌ Erreur lors de l\'ajout : ' . $e->getMessage() . "</p>";
    }
    }
    ////////////////////////////////////////////

    public function read($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM  events_List WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /////////////////////////////////////////////

    public function update($date, $name, $price, $max_places, $id) {
        
        $sql = "UPDATE events_List SET date = ?, name = ?, price = ?, max_places= ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([$date, $name, $price, $max_places, $id]);
            header('Location: ../index.php');
            exit;
        } catch (PDOException $e) {
            echo "<p>❌ Erreur : " . $e->getMessage() . "</p>";
        }
    }

    ///////////////////////////////////////////////////

    public function delete($id) {
        $sql = "DELETE FROM  events_List WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute(['id' => $id]);
            header('Location: ../index.php');
            exit;
            echo "sucess";
        } catch (PDOException $e) {
            echo "❌ Error: " . $e->getMessage();
        }
    }

    ///////////////////////////////////////////////////

    public function display() {
        $sql = "SELECT * FROM  events_List";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /////////////////////////////////////////////////////
}
 

$Event=new Event;

$data=$Event->display();

var_dump($data);
?>
