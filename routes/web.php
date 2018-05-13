<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

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
  $raw = file_get_contents(__DIR__ . "/../resources/dev/pages.json");
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

