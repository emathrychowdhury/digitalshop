<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="card-header">
            Create slider <a class="btn btn-info" href="{{route('sliders.index')}}">List</a>

        </div>
        <div class="card-body">
            <form action="{{route('sliders.update',['slider'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Slider Title</label>
                    <div class="col-8">
                        <input
                            type="text"
                            class="form-control"
                            id="inputTitle"
                            name="slider_title"
                            value="{{old('slider_title',$slider->slider_title)}}">

                    </div>
                </div>  <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Short Title</label>
                    <div class="col-8">
                        <input
                            type="text"
                            class="form-control"
                            id="inputTitle"
                            name="short_title"
                            value="{{old('short_title',$slider->short_title)}}">

                    </div>
                </div>


                <div class="mb-3">
                    <label for="inputImage" class="col-sm-3 col-form-label">Slider Image</label>
                    <div class="col-8">
                        <input
                            type="file"
                            class="form-control"
                            id="inputImage"
                            name="slider_image"
                            value="{{old('slider_image',$slider->slider_image)}}">

                    </div>
                </div>

                <div class="mb-3">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-backendTheme.layouts.master>

