<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="card-header">
            Create Product <a class="btn btn-info" href="{{route('sliders.create')}}">List</a>

        </div>
        <div class="card-body">

            <h5>Title:{{$slider-> slider_title}}</h5>
            <h5>Short Title:{{$slider-> short_title}}</h5>

                <img src="/storage/{{$slider->slider_image}}">

        </div>
    </div>


</x-backendTheme.layouts.master>

