<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('products.create')}}">Add New Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th width="200">Action</th>
                            </tr>

                            </thead>

                            <tbody>
                            @php $l=0 @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{++$l}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        @if($product->status ==1)
                                            <span class="badge rounded-pill bg-success">Action</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">InAction</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('products.show',
                                                    ['product'=>$product->id])}}">Show</a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('products.edit',
                                                    ['product'=>$product->id])}}">Edit</a>

                                        <form style="display:inline"
                                        action="{{route('products.destroy',
                                            ['product'=>$product->id])}}"
                                        method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('want to delete?')"
                                        style="font-size: 11px">Delete</button>

                                        </form>
                                    </td>


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
