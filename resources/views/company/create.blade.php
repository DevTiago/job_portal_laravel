@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(empty(Auth::user()->company->logo))
            <img src="{{ asset('avatar/avatar.png') }}" width="100" style="width: 100%">
            @else
            <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" width="100" style="width: 100%">
            @endif
            <br><br>

            <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Upload Logo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="company_logo">
                        <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                        @if($errors->has('company_logo'))
                        <div class="error mt-5" style="color: red;">{{ $errors->first('company_logo') }}</div>
                        @endif

                    </div>
                </div>
        </div>
        </form>



        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company Information</div>

                <form action="{{ route('company.store') }}" method="POST">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address" value="{{ Auth::user()->company->address }}">
                        </div>

                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ Auth::user()->company->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ Auth::user()->company->website }}">
                        </div>

                        <div class="form-group">
                            <label for="">Slogan</label>
                            <input type="text" class="form-control" name="slogan" value="{{ Auth::user()->company->slogan }}">
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control" value="{{ Auth::user()->company->description }}"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>


                        @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                        @endif

                    </div>
                </form>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">About your company</div>
                <div class="card-body">

                   <p>Company Name: <a href="company/{{ Auth::user()->company->slug }}">{{ Auth::user()->company->cname }}</a></p>
                   <p>Address: {{ Auth::user()->company->address }}</p>
                   <p>Phone: {{ Auth::user()->company->phone }}</p>
                   <p>Website: <a href="{{ Auth::user()->company->website }}" target="_blank">{{ Auth::user()->company->website }}</a></p>
                   <p>Slogan: {{ Auth::user()->company->slogan }}</p>
                
                </div>
            </div>

            <form action="{{ route('cover.photo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Upload Cover Photo</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_photo">
                        <button class="btn btn-success mt-2 float-right" type="submit">Update</button>
                        @if($errors->has('resume'))
                        <div class="error" style="color: red;">{{ $errors->first('resume') }}</div>
                        @endif
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header">Your info</div>
                <div class="card-body">Details</div>
            </div>
        </div>
    </div>
</div>

@endsection