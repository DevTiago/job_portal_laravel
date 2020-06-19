@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update the Job</div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                    @endif
                    <form action="{{ route('job.update', [$job->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Title">Title: </label>
                            <input type="text" name="title"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ $job->title}}">
                            @if($errors->has('title'))
                            <span class="error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description: </label>
                            <textarea name="description" id="" cols="20" rows="5"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">{{ $job->description }}</textarea>
                            @if($errors->has('description'))
                            <span class="error" style="color: red;">{{ $errors->first('description') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="roles">Role: </label>
                            <textarea name="roles" id="" cols="20" rows="5"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}">{{ $job->roles }}</textarea>
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('role') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="category">Category: </label>
                            <select name="category_id" id="" class="form-control">
                                @foreach(App\Category::all() as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $job->category_id ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="position">Position: </label>
                            <input type="text" name="position"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ $job->position }}">
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('position') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="address">Address: </label>
                            <input type="text" name="address"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ $job->address }}">
                            @if($errors->has('description'))
                            <span class=" error" style="color: red;">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="position">Type: </label>
                            <select name="type" class="form-control">
                                <option value="fulltime" {{ $job->type == 'fulltime' ? 'selected' : '' }}>Fulltime
                                </option>
                                <option value="parttime" {{ $job->type == 'parttime' ? 'selected' : '' }}>Parttime
                                </option>
                                <option value="casual" {{ $job->type == 'casual' ? 'selected' : '' }}>Casual</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status: </label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $job->status == '1' ? 'selected' : '' }}>Live</option>
                                <option value="0" {{ $job->status == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="position">Last date: </label>
                            <input type="text" name="last_date" id="datepicker"
                                class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                value="{{ $job->last_date }}">
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