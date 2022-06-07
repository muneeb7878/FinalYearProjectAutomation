@extends("master")
@section("content")
</section>
    <section class="container-fluid">
        <div class="container mt-5 mb-5 shadow rounded-3">
            <div class="row d-flex justify-content-center">
                <h2 class="text-center mt-3 mb-3 text-danger">Rejected Requests By Sypervisor</h2>
                @foreach($posts as $post)
                <div class="col-8 shadow rounded-3 mt-4 mb-4 bg-light p-3">
                    <span class="feed-dp d-inline-block"></span>
                    <h5 class="d-inline-block position-absolute ms-2 mt-3">{{$post->user->name}}</h5>
                    <span class="text-info ms-2">{{$post->user->role->r_name}}</span>
                    <hr class="dropdown-divider">
                    <p>{{$post->content}}</p>
                </div>
                @endforeach            
            </div>
        </div>
    </section>

@endsection