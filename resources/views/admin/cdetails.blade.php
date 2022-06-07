@extends("master")
@section("content")
<section class="container-fluid">
        <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-4 mb-4 p-5">
            <h2 class="text-center text-success mb-3">Committee Details:</h2>
            <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-4 mb-5 p-5">
                <h2 class="text-center mb-3">Committee Head:</h2>
                <div class="container d-flex bg-light align-items-center p-3 rounded-2 shadow mb-4">
                    <span class="display-pic"></span>
                    @foreach($users as $user)
                    @if($user->role_id == 2)
                    <h2 class="d-inline-block position-relative m-3">{{$user->name}}</h2>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-5 mb-4 p-5">
                <h2 class="text-center mb-3">Committee Members:</h2>
                @foreach($users as $user)
                @if($user->role_id == 3)
                <div class="container d-flex bg-light align-items-center p-3 rounded-2 shadow mb-4">
                    <span class="display-pic"></span>
                    <h2 class="d-inline-block position-relative m-3">{{$user->name}}</h2>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection