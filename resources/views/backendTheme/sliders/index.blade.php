<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('sliders.create')}}">Add New Slider</a>
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
                                <th>SliderTitle</th>
                                <th>ShortTitle</th>
                                <th>Image</th>
                                <th width="200">Action</th>
                            </tr>

                            </thead>

                            <tbody>
                            @php $l=0 @endphp
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{++$l}}</td>
                                    <td>{{$slider->slider_title}}</td>
                                    <td>{{$slider->short_title}}</td>
                                    <td><img src="/storage/{{($slider->slider_image)}}" style="width: 70px;height: 40px"></td>

                                    <td>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('sliders.show',
                                                    ['slider'=>$slider->id])}}">Show</a>
                                        <a class="btn btn-info btn-sm"
                                           href="{{route('sliders.edit',
                                                    ['slider'=>$slider->id])}}">Edit</a>

                                        <form style="display:inline"
                                              action="{{route('sliders.destroy',
                                            ['slider'=>$slider->id])}}"
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
