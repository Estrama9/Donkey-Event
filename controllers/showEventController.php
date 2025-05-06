<?php

require_once __DIR__ . '/../models/Events.php';

class DisplayEventController {
    public function showEventPage($id) {
        $eventModel = new Events;
        $event = $eventModel->displayEvent($id);
        require_once __DIR__ . '/../views/show-event.php';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $controller = new DisplayEventController;
    $controller->showEventPage($id);
}

?>