@extends("frontend.layouts.default", ["title" => isset($title) ? $title : "Undefined"])

@section("content")

<div class="container">
  <div class="row">
    <div class="col-xs-12">

      <h1>{{ $title }}</h1>
      <p>This is the home page</p>

    </div>
  </div>
</div>

@stop