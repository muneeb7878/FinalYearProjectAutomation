@extends("master")
@section("content")
<!-- Upload Database Section -->

<section class="container-fluid d-flex justify-content-center align-items-center h-100">
        <div class="container">
                           
            <!-- For Uploading Supervisor Database Files -->
            <h1 class="text-center text-success mb-4">Drag & Drop Supervisors Database Here:</h1>
            
            <div class="row d-flex justify-content-center ">
                @if(Session::get('success'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                           </div>
                           @endif
                <div class="col-lg-8">
                    <form action="{{route('upload.supervisor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="filename" required>
                            <span class="text-danger">@error('filename') {{$message}} @enderror</span>
                        </div>
                        <button type="submit" class="btn btn-lg btn-outline-success float-end mt-3">Upload</button>
                    </form>
                </div>
            </div>
            <!-- For Uploading Supervisor Database Files -->
            <h1 class="text-center text-primary mt-5 mb-4">Drag & Drop Students Database Here:</h1>
            <div class="row d-flex justify-content-center ">
                <div class="col-lg-8">
                    <form action="{{route('upload.student')}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control" id="customFile" name="filename" required>
                            <span class="text-danger">@error('filename') {{$message}} @enderror</span>
                        </div>
                        <button type="submit" class="btn btn-lg btn-outline-primary float-end mt-3">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection