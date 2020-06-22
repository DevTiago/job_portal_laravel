@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $job->title }}</div>

                <div class="card-body">
                    <p>
                        <h3>Description</h3>
                        {{ $job->description }}
                    </p>
                    <p>
                        <h3>Duties</h3> {{ $job->roles }}

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Short Info</div>
                <div class="card-body">
                    <p>Company: <a
                            href="{{ route('company.index', [$job->company->id, $job->company->slug]) }}">{{ $job->company->cname }}</a>
                    </p>
                    <p>Address: {{ $job->address }}</p>
                    <p>Employment Type: {{ $job->type }}</p>
                    <p>Position: {{ $job->position }}</p>
                    <p>Posted: {{ $job->created_at->diffForHumans() }} </p>
                    <p>Laste date fo apply:{{ date('F d Y', strtotime($job->last_date)) }}</p>
                </div>
            </div>

            @if(Auth::check() && Auth::user()->user_type='seeker')
            @if(!$job->checkApplication())
            <apply-component jobid={{ $job->id }}></apply-component>
            @else
            <div class="alert alert-success mt-2 text-center">You already applied for this job</div>
            @endif
            @if(Session::has('message'))
            <div class="alert alert-success mt-1">
                {{ Session::get('message') }}
            </div>
            @endif
            @endif
        </div>


    </div>
</div>
@endsection