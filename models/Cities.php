<?php
//require_once "../modeles/Base.php";
require_once __DIR__ . '/../models/Base.php';

interface CitiesOperation {
    public function create($name);
    public function read($id);
    public function update($name, $id);
    public function delete($id);           
    public function display();
    
};

class Cities extends Base implements CitiesOperation {

    public function create($name) {

        $sql = "INSERT INTO Cities (name) VALUES (?)";
        $stmt = $this->pdo->prepare($sql);

    try {
        $stmt->execute([$name]);
        header('Location: ../index.php');
        exit;
    } catch (PDOException $e) {
        echo "<p>" . '❌ Erreur lors de l\'ajout : ' . $e->getMessage() . "</p>";
    }
    }
    ////////////////////////////////////////////

    public function read($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM  Cities WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /////////////////////////////////////////////

    public function update($name, $id) {
        
        $sql = "UPDATE Cities SET name = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([$name, $id]);
            header('Location: ../index.php');
            exit;
        } catch (PDOException $e) {
            echo "<p>❌ Erreur : " . $e->getMessage() . "</p>";
        }
    }

    ///////////////////////////////////////////////////

    public function delete($id) {
        $sql = "DELETE FROM  Cities WHERE id = :id";
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
        $sql = "SELECT * FROM  Cities";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /////////////////////////////////////////////////////
}