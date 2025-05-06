<?php
require_once __DIR__ . '/../models/Cities.php';
require_once __DIR__ . '/../models/Events.php';



class DisplaySearchController {
    public function showSearch() {
        $cityModel = new Cities();
        $eventModel = new Events();
        $categoryModel = new Events();

        $cities = $cityModel->display();
        $dates = $eventModel->display();
        $categories = $categoryModel->displayCategory();

        require_once __DIR__ . '/../views/find-event.php';
    }

}

// Call controller
$controller = new DisplaySearchController();
$controller->showSearch();
