@extends('layouts.main')
@section('title', 'Dashboard Home')
@section('content')

<div class="">
    <h1 class="text-xl font-bold p-4">Dashboard Home</h1>
    <div class="w-full h-20 bg-gray-300 rounded-lg flex p-4">
        <h1 class="text-xl font-bold items-start justify-center">Hello {{ Auth::user()->name }}</h1>
    </div>
</div>

@endsection

