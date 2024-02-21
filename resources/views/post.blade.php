@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center border p-3 my-4">View Your Single Post</h1>
            </div>
            <div class="col-12">
                <div class="card mb-3">
                  <div class="card-header">
                    {{ $post->user->name }} - {{ $post->created_at->format('d/m') }}
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Title : {{ $post->title }}</h5>
                    <p class="card-text">Description : {{ $post->description }}</p>
                    <a href="{{ url('/') }}" class="btn btn-warning">Back</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
