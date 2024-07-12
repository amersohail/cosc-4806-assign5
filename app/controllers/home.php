<?php

class Home extends Controller {

  public function __construct() {
      $user = $this->model('User');

      // Ensure user is authenticated
      if (!$user->isAuthenticated()) {
          // If not, redirect to the home page
        header("Location: /login");
        exit();
      }
  }

    public function index() {
      $user = $this->model('User');
      $this->view('home/index');
	    die;
    }
}
?>