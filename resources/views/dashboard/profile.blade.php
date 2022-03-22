@extends('layouts.app')

@section('title')
SA Lantern | User Profile Settings
@endsection

@section('content')
    <div id="app">
        <profile
        :user="{{ auth()->user() }}"
        :age="'{{ $age }}'"
        >

        </profile>
    </div>
@endsection
