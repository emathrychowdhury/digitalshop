<x-backendTheme.layouts.master>

    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Dashboard</h1>

        <div class="card-header">
            Create Product <a class="btn btn-info" href="{{route('products.index')}}">List</a>

        </div>
        <div class="card-body">
            <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Slider Title</label>
                    <div class="col-8">
                        <input
                            type="text"
                            class="form-control"
                            id="inputSliderTitle"
                            name="slider_title"
                            value="">
                    </div>
                </div>
               <div class="mb-3">
                    <label for="inputTitle" class="col-sm-3 col-form-label">Short Title</label>
                    <div class="col-8">
                        <input
                            type="text"
                            class="form-control"
                            id="inputShortTitle"
                            name="short_title"
                            value="">
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
                            value="">
                    </div>
                </div>


                <div class="mb-3">
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-backendTheme.layouts.master>
