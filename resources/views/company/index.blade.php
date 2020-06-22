@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            @if(empty(Auth::user()->company->cover_photo))
            <img src="{{ asset('avatar/banner.jpg') }}" style="width: 100%">
            @else
            <img src="{{ asset('uploads/coverphoto') }}/{{ Auth::user()->company->cover_photo }}" style="width:100%">

            @endif
            <div class="company-desc">


                @if(empty(Auth::user()->company->logo))
                <img src="{{ asset('avatar/avatar.png') }}" width="100" style="width: 50%">
                @else
                <img src="{{ asset('uploads/logo')}}/{{ Auth::user()->company->logo }}" width="100">
                @endif

                <p>Description: {{ $company->description }}</p>
                <h1>{{ $company->cname }}</h1>
                <p>Slogan - {{ $company->slogan }} Address -{{ $company->address }} Phone -{{ $company->phone }} Website
                    - {{ $company->website }} </p>
            </div>
        </div>

        <table class="table">
            <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach($company->jobs as $job)
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