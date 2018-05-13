@extends("frontend.layouts.default", ["title" => isset($title) ? $title : "Undefined"])

@section("content")

<div class="container">
  <div class="row">
    <div class="col-xs-12">

      <h1>{{ $title }}</h1>
      <p>This is the product page</p>

      <h3>All products</h3>

      <ul>
        @foreach($products as $product)
        <li>{{ $product["name"] }} - {{ $product["price"] }} USD ({{ $product["type"] }})</li>
        @endforeach
      </ul>

    </div>
  </div>
</div>

@stop