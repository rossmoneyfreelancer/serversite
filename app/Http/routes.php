<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);

/*
|--------------------------------------------------------------------------
| Frontend Development Routing
|--------------------------------------------------------------------------
|
| Collects pages with related data from a JSON file.
|
*/

// Disable frontend routing by setting the environment variable to false
if(env("FRONTEND_DEVELOPMENT_ROUTING")) {

  // Collect and decode JSON data into a loopable Array
  $raw = file_get_contents(__DIR__ . "/../../resources/dev/pages.json");
  $pages = json_decode($raw, true);
  $viewPrefix = "frontend.";

  // Loop through pages and register routes for each, pass data if it exists
  foreach($pages as $page) {
    Route::get($page["path"], function() use ($page, $viewPrefix) {
      $file = $viewPrefix . $page["file"];
      $data = isset($page["data"]) ? $page["data"] : [];
      $data["title"] = $page["title"];

      return view($file, $data);
    });
  }

}
