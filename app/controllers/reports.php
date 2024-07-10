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

        $report = $this->model('Report');
        $logins_list = $report->get_logins_by_users();
        $reminders_list = $report->get_reminders_by_users();
        // Load the view without passing any data
       // $this->view('reports/index');

        // Pass both lists to the view
        $this->view('reports/index', [
            'logins' => $logins_list,
            'reminders' => $reminders_list
        ]);
    }
}

?>