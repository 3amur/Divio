@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center border p-3 my-4">View All Posts To Users</h1>
            </div>
            <div class="col-12">
              @foreach ($posts as $post)
                <div class="card mb-3">
                  <div class="card-header">
                    {{ $post->user->name }} - {{ $post->created_at->format('d/m') }}
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ \Str::limit($post->description,250) }}</p>
                    <a href="{{ url('post/'.$post->id) }}" class="btn btn-primary">View Post</a>
                  </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
@endsection
