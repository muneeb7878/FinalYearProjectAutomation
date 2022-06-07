@extends("master")
@section("content")

<section class="container-fluid">
        <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-5 mb-5 p-5">
        @if(Session::get('sent'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('sent')}}
                            </div>
                           </div>
                           @elseif(Session::get('Assigned'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('Assigned')}}
                            </div>
                           </div>
                           @elseif(Session::get('gfirst'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('gfirst')}}
                            </div>
                           </div>
                           @endif
            <h2 class="text-center text-success mb-4">Send Request to Supervisor/Advisor:</h2>
@foreach($users as $user)
@if($user->role_id == 4 )
            <div class="container d-flex bg-light align-items-center p-3 rounded-2 shadow mb-4">
                <span class="display-pic"></span>
                <div class="d-block">
                    <h2 class="position-relative ms-3 mb-0">{{$user->name}}</h2>
                    <!-- <span class="d-block text-info ms-3">Tag</span>
                    <span class="text-success ms-3">GPA</span> -->
                </div>
                
                <a href="/sendreq_to_sup/{{$user->id}}">
                <button type="button" class="btn btn-primary reqBtn">Send Request</button>
                </a>
            </div>
@endif
@endforeach
        </div>
    </section>

    <!-- Send Requuest to Students Section -->

    <section class="container-fluid">
        <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-5 mb-5 p-5">
                           @if(Session::get('requestsent'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('requestsent')}}
                            </div>
                           </div>
                           @elseif(Session::get('limitfull'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('limitfull')}}
                            </div>
                           </div>
                          
                           @endif
            <h2 class="text-center text-success mb-4">Send Request to Students:</h2>
            @foreach($users as $user)
            @if($user->role_id == 5)
            <div class="container d-flex bg-light align-items-center p-3 rounded-2 shadow mb-4">
                <span class="display-pic"></span>
                <div class="d-block">
                    <h2 class="position-relative ms-3 mb-0">{{$user->name}}</h2>
                    <!-- <span class="d-block text-info ms-3">Tag</span> -->
                    <span class="text-success ms-3">CGPA : {{$user->grades}}</span>
                </div>
                <a href="/send/{{$user->id}}">
                <button type="button" class="btn btn-primary reqBtn">Send Request</button>
                </a>
            </div>
            @endif
@endforeach
        </div>
    </section>

@endsection