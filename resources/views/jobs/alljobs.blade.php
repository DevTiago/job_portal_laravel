@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <form action="{{ route('allJobs') }}">
            <div class="form-inline search">
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="position" class="form-control" placeholder="job position">
                </div>
                <div class="form-group">
                    <label>Employment</label>
                    <select class="form-control" name="type">
                        <option value="">Select</option>
                        <option value="fulltime">fulltime</option>
                        <option value="parttime">parttime</option>
                        <option value="casual">casual</option>
                    </select>

                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select</option>

                        @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>

                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="address">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-search btn-primary btn-block" value="Search">
                </div>
            </div>
        </form>




        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($jobs as $job)
                <tr>
                    <td><img src="{{ asset('uploads/avatar')}}/{{ $job->company->logo }}" width="80"></td>
                    <td>Position: {{ $job->position }}
                        <br>
                        <i class="fa fa-clock-o" aria-hiddern="true"></i> {{ $job->type }}
                    </td>
                    <td><i class="fa fa-map-marker" aria-hidder="true"></i>Address: {{ $job->address }}</td>
                    <td><i class="fa fa-globe" aria-hidder="true"></i> Date: {{ $job->created_at->diffForHumans() }}
                    </td>
                    <td>
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                            <button class="btn btn-success btn-ssm">Apply</button>
                        </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- pagination jobs --}}
        {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links()}}
    </div>

</div>
@endsection

<style>
    .fa {
        color: #4183D7;
    }
</style>