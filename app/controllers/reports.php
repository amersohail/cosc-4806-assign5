<?php

class Reports extends Controller {

    public function __construct() {
        session_start();

        // Ensure user is authenticated and is an admin
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1 || !isset($_SESSION['isadmin']) || $_SESSION['isadmin'] != 1) {
            // If not, redirect to the home page
            header('Location: /home');
            exit();
        }
    }

    public function index() {
        // Load the view without passing any data
        $this->view('reports/index');
    }
}

?>