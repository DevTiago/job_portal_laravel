@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
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
                    <td><img src="{{ asset('avatar/avatar.png') }}" width="80"></td>
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
    </div>
</div>
@endsection


<style>
    .fa {
        color: #4183D7;
    }
</style>