@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <h1 class="text-center border p-3 my-4">Add Post</h1>
            </div>
            <div class="col-8 mx-auto">
                <form action="{{ url('posts') }}" method="POST" class="border p-3">
                    @if (session()->get('success') != null)
                            <h6 class="alert alert-success text-center">{{ session()->get('success') }}</h6>
                    @endif
                    @csrf
                    <div class="mb-3">
                        <label for="">Post Title</label>
                        <input type="text" value="{{ old('title') }}" name="title" class="form-control">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Post Description</label>
                        <textarea class="form-control" value="{{ old('description') }}" name="description" rows="4"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Writer</label>
                        <select name="user_id" class="form-control">
                            <option value="1">Omar</option>
                            <option value="2">Bahgaa</option>
                        </select>
                        @error('user_id')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Save" class="form-control bg-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
