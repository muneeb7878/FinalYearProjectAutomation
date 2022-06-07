@extends("master")
@section("content")

<body>
    <!-- Received Requests Section -->
    <section class="container-fluid">
        <div class="container shadow rounded-3">
            <div class="row d-flex justify-content-center">
                <!-- Write post section -->

                @if(session()->get('loggeduser')->role_id == 4 || session()->get('loggeduser')->role_id == 5)
                <div class="col-8 shadow rounded-3 mt-5 mb-4 text-center">
                    <button type="button" id="postBtn" class="btn btn-primary rounded-3 m-4">Write a post</button>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 mb-3 mt-5" id="post">
                        <form action="{{route('sup.post')}}" method="POST"> 
                        @csrf
                                <h1 class="text-center text-primary">Write a Post</h1>
                            <textarea class="form-control" id="message-text" name="idea" required></textarea>
                            <button type="submit" class="btn btn-outline-primary rounded-pill mt-2 float-end" name="SubmitBtn">Create Post</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <!-- Model -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLabel">Rejection reason</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <i class="fas fa-comment-dots text-primary h1"></i>
                                <h3>Write your idea here:</h3>
                                <form>
                                    <div class="mb-3 text-start">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Post</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- post from users -->
                @foreach($posts as $post)
                <div class="col-8 shadow rounded-3 mt-4 mb-4 bg-light p-3">
                    <div class="d-flex align-items-center">
                        <div class="feed-dp"></div>
                        <div class="ms-3">
                            <h5 class="mb-1">{{$post->user->name}}</h5>
                            <div class="">
                                <span class="text-info">{{$post->user->role->r_name}}</span> <br>
                                
                                @if($post->user->group_id != null && $post->user->role_id != 4)
                                <span class="text-info">Group ID : {{$post->user->group->name}}</span>
                                @endif
                            </div>
                        </div>
                    </div>                    
                    <hr class="dropdown-divider">
                    <p>{{$post->content}}</p>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>
</body>

</html>
@endsection
