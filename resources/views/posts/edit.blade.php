@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1 class="text-center border p-3 my-4">Edit Post</h1>
            </div>
            <div class="col-8 mx-auto">
                <form action="{{ url('posts/'.$post->id) }}" method="POST" class="border p-3">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="">Post Title</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Post Description</label>
                        <textarea class="form-control" name="description" rows="4">{{ $post->description }}</textarea>
                    </div>
                    @error('description')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="mb-3">
                        <label for="">Writer</label>
                        <select name="user_id" class="form-control">
                            <option value="1">Omar</option>
                            <option value="2">Bahgaa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Save" class="form-control bg-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
