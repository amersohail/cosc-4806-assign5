<?php

class Reports extends Controller {

    public function __construct() {
        $user = $this->model('User');

        // Ensure user is authenticated and is an admin
        if (!$user->isAuthenticated() || !$user->isAdmin()) {
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