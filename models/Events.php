<?php
//require_once "../modeles/Base.php";
require_once __DIR__ . '/Base.php';

interface EventOperation {
    public function create($date, $name, $price, $max_places);
    public function read($id);
    public function update($date, $name, $price, $max_places, $id);
    public function delete($id);           
    public function display();
    public function displayCategory();
    public function displayEvents($cityId, $categoryId, $date);
    public function displayEvent($id);
    
};

class Events extends Base implements EventOperation {

    public function create($date, $name, $price, $max_places) {

        $sql = "INSERT INTO Events_List (date, name, price, max_places) VALUES (?, ?, ?, ?)";
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
        
        $sql = "UPDATE Events_List SET date = ?, name = ?, price = ?, max_places= ? WHERE id = ?";
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
        $sql = "DELETE FROM  Events_List WHERE id = :id";
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
        $sql = "SELECT * FROM  Events_List";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /////////////////////////////////////////////////////

    public function displayCategory() {
        $sql = "SELECT Categories.id, Categories.name as name_category  FROM  Events_List 
        INNER JOIN Categories ON Events_List.id_category = Categories.id";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //////////////////////////////////////////////////////

    public function displayEvent($id) {
        $sql = "SELECT *, Events_List.name AS event_name, Events_List.date as event_date, Cities.name AS city_name, Categories.name AS category_name 
                FROM Events_List 
                INNER JOIN Categories ON Events_List.id_category = Categories.id
                INNER JOIN Cities ON Events_List.id_city = Cities.id
                WHERE Events_List.id = :id";

                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    ////////////////////////////////////////////////////////////

    public function displayEvents($cityId, $categoryId, $date) {
        $sql = "SELECT *, Events_List.name AS event_name, Events_List.date as event_date, Cities.name AS city_name, Categories.name AS category_name 
                FROM Events_List 
                INNER JOIN Categories ON Events_List.id_category = Categories.id
                INNER JOIN Cities ON Events_List.id_city = Cities.id
                WHERE 1=1";
    
        $params = [];
    
        if (!empty($cityId)) {
            $sql .= " AND Events_List.id_city = :cityId";
            $params['cityId'] = $cityId;
        }
    
        if (!empty($categoryId)) {
            $sql .= " AND Events_List.id_category = :categoryId";
            $params['categoryId'] = $categoryId;
        }
    
        if (!empty($date)) {
            $sql .= " AND Events_List.date = :date";
            $params['date'] = $date;
        }
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    
}
    
 

// $Event=new Events;

// $data=$Event->displayEvents($id);

// var_dump($data);
?>