@extends("master")
@section("content")

<section class="container-fluid">
        <h1 class="text-center text-success mt-3">Pending Requests From Students:</h1>
        <div class="container shadow-lg rounded-3">
                        @if(Session::get('rejected'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('rejected')}}
                            </div>
                           </div>
                           @elseif(Session::get('done'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('done')}}
                            </div>
                           </div> 
                        @endif
            <div class="row d-flex justify-content-between position-relative mt-4 mb-4 p-5">
            @foreach($users as $user)
                <div class="col-lg-3 col-md-5 text-center col-sm-8 d-block bg-light p-3 rounded-2 shadow mb-4 ms-1">
                    <span class="dp-request"></span>
                    <h4 class="d-block text-center mt-3 mb-0">{{$user->name}}</h4>
                    <span class="text-info">Supervisor/Advisor</span>
                    <div class="text-center mt-2">
                        <a href="/aprove/{{$user->id}}">
                        <input class="btn btn-primary" type="submit" value="Approve">
                        </a>
                        <a href="/decline/{{$user->id}}">
                        <input class="btn btn-secondary" type="submit" value="Decline">

                        </a>
                    </div>
                </div>   
             @endforeach   
            </div>
        </div>
    </section>
@endsection