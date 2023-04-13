<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('products.create')}}">Add New Product</a>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-success">
                                <span class="close" data-dismiss="alert"></span>
                                <strong>{{session('message')}}</strong>
                            </div>
                        @endif
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
                                        @if($product->status ==1)
                                           <a
                                               href="{{route('product.active',$product->id)}}"
                                               class="btn btn-primary btn-sm" title="active">
                                               <i class="fa-solid fa fa-thumbs-up"></i>
                                           </a>
                                        @else
                                            <a
                                                href="{{route('product.inactive',$product->id)}}"
                                                class="btn btn-primary btn-sm" title="inactive">
                                                <i class="fa-solid fa fa-thumbs-up"></i>
                                            </a>
                                        @endif
                                    </td>
{{--                                    <td>--}}
{{--                                        @if($product->status==1)--}}
{{--                                            <a--}}
{{--                                            href="{{route('$products.edit',['product'=>$product->id]) }}"--}}
{{--                                            class="btn btn-success btn-sm" title="InActive">--}}
{{--                                                <i class="fa-solid fa-thumbs-down"></i>--}}
{{--                                            </a>--}}
{{--                                        @else--}}
{{--                                            <a--}}
{{--                                               href="{{route('$products.edit',['product'=>$product->id]) }}"--}}
{{--                                               class="btn btn-success btn-sm"--}}
{{--                                               title="InActive">--}}
{{--                                                <i class="fa-solid fa-thumbs-down"></i>--}}
{{--                                            </a>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
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
