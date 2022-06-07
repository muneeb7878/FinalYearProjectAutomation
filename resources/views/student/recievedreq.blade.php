@extends("master")
@section("content")
<section class="container-fluid">
        <h1 class="text-center mt-3">Received Requests</h1>
        <div class="container shadow-lg rounded-3">
                           @if(Session::get('declined'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('declined')}}
                            </div>
                           </div>
                           @elseif(Session::get('Accepted'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('Accepted')}}
                            </div>
                           </div>
                           @elseif(Session::get('Already'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('Already')}}
                            </div>
                           </div>
                           
                           @endif
            <div class="row d-flex justify-content-between position-relative mt-4 mb-4 p-5">
            @foreach($users as $user)

                <div class="col-lg-3 col-md-5 col-sm-8 d-block bg-light p-3 rounded-2 shadow mb-4 ms-1">
                    <span class="dp-request"></span>
                    <h4 class="d-block text-center m-3">{{$user->name}}</h4>
                    <p class="text-center">CGPA : {{$user->grades}}</p>
                    <div class="text-center">
                        <a href="/accept/{{$user->id}}">
                            <input class="btn btn-primary" type="submit" value="Accept">
                        </a>
                        <a href="/reject/{{$user->id}}">
                            <input class="btn btn-secondary" type="submit" value="Turn Down">
                        </a>
                        
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection