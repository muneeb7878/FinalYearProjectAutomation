@extends("master")
@section("content")

        <section class="container-fluid">
            <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-4 mb-4 p-5">
                <h2 class="text-center text-success mb-3">Group Name</h2>
                <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-4 mb-5 p-5">
                @if(session()->get('loggeduser')->group_id != null)
                    <h2 class="text-center mb-3">{{session()->get('loggeduser')->group->name}}</h2>
                    @endif
                    @foreach($users as $user)
                    @if($user->role_id == 4 && $user->group_id != null)
                <div class="container d-flex bg-light align-items-center p-3 rounded-2 shadow mb-4">
                    <span class="display-pic"></span>
                    <h2 class="d-inline-block position-relative m-3">{{$user->name}}</h2>   
                </div>
                @endif
                @endforeach
                </div>


                <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-5 mb-4 p-5">
                    <h2 class="text-center mb-3">Student</h2> 
                @foreach($users as $user)
                @if($user->role_id == 5 && $user->group_id != null)
                <div class="container d-flex bg-light align-items-center p-3 rounded-2 shadow mb-4">
                    <span class="display-pic"></span>
                    <h2 class="d-inline-block position-relative m-3">{{$user->name}}</h2>   
                </div>
                @endif
                @endforeach

                </div>

            </div>
            </div>
            </div>
        </section>
  
@endsection
    