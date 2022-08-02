@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Blog</div>

                    <div class="card-body">
                        <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark mt-2">Submit</button>
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Image
                                </th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post->title }}
                                    </td>
                                    <td>
                                     <img src="{{ Storage::url($post->image) }}" class="img-fluid rounded-top" alt="">   
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
