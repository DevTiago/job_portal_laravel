@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    <table class="table m-0">
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
                                <td style="width:165px">
                                    @if(empty(Auth::user()->company->logo))
                                    <img src="{{ asset('avatar/avatar.png') }}" style="width: 50%">
                                    @else
                                    <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}"
                                        style="width: 80%">
                                    @endif
                                </td>
                                <td>Position: {{ $job->position }}
                                    <br>
                                    <i class="fa fa-clock-o" aria-hiddern="true"></i> {{ $job->type }}
                                </td>
                                <td><i class="fa fa-map-marker" aria-hidder="true"></i>Address: {{ $job->address }}</td>
                                <td><i class="fa fa-globe" aria-hidder="true"></i> Date:
                                    {{ $job->created_at->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('job.edit', [$job->id])}}">
                                        <button class="btn btn-success">Edit</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection