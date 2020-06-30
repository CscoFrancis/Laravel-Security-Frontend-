@extends('layouts.app')

@section('content')
<div id="main">
</div>
<br>
<div class="container">
    <div class="container">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
    </div>
</div>
<br>
<div class="container">
    <ol class="list-group list-group-flush">
        @foreach($products as $product)
        <li class="list-group-item">{{ $product->name }}<span class="float-right"><a class="btn btn-sm btn-success" href="{{route('admin.products.view')}}"> View </a>  <a class="btn btn-sm btn-danger" href="#"> Delete </a></span></li>
        @endforeach
    </ol>
</div>

@endsection























{{-- <x-navbar-component style="color:green; text-align:center; margin:10px; background:pink; font-size:20px; padding:10px;" message="Navbar">
    <x-slot name="title">
       Title: {{ $component->title}}
</x-slot>
</x-navbar-component> --}}

{{-- @date(time()) --}}

{{-- @section('sidebar')
    @parent
    <x-button style="color:white; border-radius:2px; border:solid red 3px; padding:5px; background:green; min-width:30px; min-height:20px;"  text="Click Me"/>
@endsection --}}
{{-- @guest
    @section('content')
        <ol>
            @foreach( $products as $product )
                
                <li>{{ $product->name }}</li>

@endforeach
</ol>
@endsection
@endauth --}}

{{-- @production
    <p>This is displayed in production only</p>
@endproduction --}}

{{-- @greet() --}}
{{--
<script>
    function show() {
        let data = @json($products);
        let data2 = '';
        console.log(data2);
    }

</script> --}}
