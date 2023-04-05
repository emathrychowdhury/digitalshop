<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('products.create')}}">Add New Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th width="400">Action</th>
                            </tr>

                            </thead>

                            <tbody>
                            @php $l=0 @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{++$l}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->Description}}</td>
                                    <td>{{$product->price}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


</x-backendTheme.layouts.master>
