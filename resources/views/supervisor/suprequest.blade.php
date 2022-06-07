@extends("master")
@section("content")

   <!-- Received Requests Section -->

   <section class="container-fluid">
        <h1 class="text-center mt-3">Received Requests</h1>
        <div class="container shadow-lg rounded-3">
                        @if(Session::get('transfered'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('transfered')}}
                            </div>
                           </div>
                        @elseif(Session::get('wait'))
                        <div>
                           <div class="alert alert-danger">
                                {{Session::get('wait')}}
                            </div>
                           </div>
                           @elseif(Session::get('rejected'))
                        <div>
                           <div class="alert alert-success">
                                {{Session::get('rejected')}}
                            </div>
                           </div>
                        @endif
            <div class="row d-flex justify-content-between position-relative mt-4 mb-4 p-5">
            @if(session()->get('loggeduser')->group_id == null)    
            @foreach($users as $user)  

                <div class="col-lg-3 col-md-5 col-sm-8 d-block bg-light p-3 rounded-2 shadow mb-4 ms-1">
                    <span class="dp-request"></span>
                    <h4 class='d-block text-center m-3'>{{$user->name}}</h4>
                    <h4 class='d-block text-center m-3'>Group Name : {{$user->group->name}}</h4>
                    <div class="text-center">
                    <a href="/acceptreq/{{$user->id}}">
                    <input class="btn btn-primary" type="submit" value="Accept">
                    </a>
                    <a href="/rejectreq/{{$user->id}}">
                    <input class="btn btn-secondary" type="submit" value="Decline" data-bs-toggle="modal" data-bs-target="#staticBackdrop">      
                    </a>
                    </div>
                </div>
                @endforeach
                @endif
                
            </div>
        </div>
        
    </section>   
@endsection