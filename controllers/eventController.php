<?php

require_once __DIR__ . '/../models/Events.php';

class DisplayEventController {
    public function showEventPage($cityId, $categoryId, $date) {
        $eventModel = new Events;
        $events = $eventModel->displayEvents($cityId, $categoryId, $date);

        require_once __DIR__ . '/../views/event-list.php';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cityId = isset($_GET['city']) ? (int) $_GET['city'] : 0;
    $categoryId = isset($_GET['category']) ? (int) $_GET['category'] : 0;
    $date = isset($_GET['date']) ? $_GET['date'] : null;

    $controller = new DisplayEventController;
    $controller->showEventPage($cityId, $categoryId, $date);
}
