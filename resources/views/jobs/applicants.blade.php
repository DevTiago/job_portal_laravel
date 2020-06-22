@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @foreach($applicants as $applicant)
                <div class="card-header">{{ $applicant->title }}</div>
                <div class="card-body">
                    @foreach($applicant->users as $user)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name:</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Bio</th>
                                <th>Exp</th>
                                <th>Cover Letter</th>
                                <th>Resume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profile->address }}</td>
                                <td>{{ $user->profile->gender }}</td>
                                <td>{{ $user->profile->bio }}</td>
                                <td>{{ $user->profile->experience }}</td>
                                <td><a href="{{ Storage::url($user->profile->resume) }}" target="_blank">Resume</a></td>
                                <td><a href="{{ Storage::url($user->profile->cover_letter) }}" target="_blank">Cover
                                        Letter</a></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
                @endforeach
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection