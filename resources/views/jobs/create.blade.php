@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new Job</div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form action="{{ route('job.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Title">Title: </label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('title') }}">
                            @if($errors->has('title'))
                            <span class="error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description: </label>
                            <textarea name="description" id="" cols="20" rows="5"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('description') }}"></textarea>
                            @if($errors->has('description'))
                            <span class="error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="roles">Role: </label>
                            <textarea name="roles" id="" cols="20" rows="5"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('roles') }}"></textarea>
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select name="category" id="" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="position">Position: </label>
                            <input type="text" name="position"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('position') }}">
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input type="text" name="address"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('address') }}">
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="position">Type: </label>
                            <select name="type" class="form-control">
                                <option value="fulltime">Fulltime</option>
                                <option value="parttime">Parttime</option>
                                <option value="casual">Casual</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" class="form-control">
                                <option value="1">Live</option>
                                <option value="0">Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="position">Last date: </label>
                            <input type="date" name="last_date"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ old('last_date') }}">
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection