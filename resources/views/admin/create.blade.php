@extends("master")
@section("content")
    <section class="container-fluid">
    
        <div class="container overflow-auto d-block shadow-lg rounded-3 position-relative mt-4 mb-4 p-5">
                           @if(Session::get('fail'))
                           <div>
                           <div class="alert alert-danger">
                                {{Session::get('fail')}}
                            </div>
                           </div>
                           @elseif(Session::get('success'))
                           <div>
                           <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                           </div>
                           @endif
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-outline-primary" id="committeeBtn">Create Committe</button>
            </div>
            <div class="createCommittee">
                <div class="row position-relative d-flex justify-content-center">
                    <div class="col-md-8 h-auto">
                        <div class="login-form bg-light p-4 h-auto rounded-3 shadow-sm">
                            <form action="{{route('admin.create')}}" method="post" class="row g-5">
                                @csrf
                                <div class="col-12">
                                    <label>Username:</label>
                                    <input type="text" id="userName" name="name" class="form-control" placeholder="User Name" required>
                                </div>
                                <div class="col-12 passwordField">
                                    <label>Email:</label>
                                    <input type="email" id="userEmail" name="email" class="form-control" placeholder="Email" required>
                                    <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-center buttons">
                                    
                                    @if(!$check)
                                        <button onclick="assignedAlert()" class="btn btn-outline-primary me-md-2 me-sm-0" type="submit" value="makehead" name="action">Make Committee Head</button>
                                    @endif
                                 
                                        <button onclick="assignedAlert()" class="btn btn-outline-dark" type="submit" value="makemember" name="action">Make Committee Member</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection