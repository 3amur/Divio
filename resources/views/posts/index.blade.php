@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center border p-3 my-4">All Posts</h1>
        </div>
        <div class="col-12">
            <a href="{{ url('posts/create') }}" class="btn btn-primary text-center my-1">Add New Post</a>
            @if(session()->get('success') != null)
                <h6 class="alert alert-success text-center">{{ session()->get('success') }}</h6>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Writer</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>
                            <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ url('posts/'.$post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="delete" class="btn btn-danger">
                            </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection