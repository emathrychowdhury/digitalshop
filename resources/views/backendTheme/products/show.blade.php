<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="card-header">
            Create Product <a class="btn btn-info" href="{{route('products.create')}}">List</a>

        </div>
        <div class="card-body">

            <h5>Title:{{$product->title}}</h5>
            <h5>Description:{{$product->description}}</h5>
            <h5>Price:{{$product->price}}</h5>

                <img src="/storage/{{$product->image}}">

        </div>
    </div>


</x-backendTheme.layouts.master>

