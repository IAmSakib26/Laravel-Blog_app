@extends('posts/layout')
@section('content')

<h1 class="text-center">Blog Post</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{section('success')}}
    </div>
    
@endif

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                <td>
                    <a href="{{route(posts.show,$post)}}" class="btn btn-primary">View</a>
                    <a href="{{route(posts.edit,$post)}}" class="btn btn-secondary">Edit</a>
                    <form action="{{route(posts.distroy,$post)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
    {{-- {{$post->links()}} --}}
</table>
    
@endsection