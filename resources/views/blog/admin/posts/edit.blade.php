@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogPost $item */
    @endphp
    <div class="container">
        @include('blog.admin.posts.includes.result_messages')
        @if($item->exists)
            @if(session('success'))
                <div class="row justify-content-center">
                    <div class="clo-md-11">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ session()->get('success') }}
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{ route('blog.admin.posts.update', $item->id) }}" method="POST">
                @method('PATCH')
        @else
            <form action="{{ route('blog.admin.posts.store') }}" method="POST">
        @endif
                @csrf
                        <div class="row ">
                            <div class="col-md-8">
                                @include('blog.admin.posts.includes.post_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.posts.includes.post_edit_add_col')
                            </div>
                        </div>
                    </form>
                 @if($item->exists)
                        <br>
                        <form action="{{ route('blog.admin.posts.destroy', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <div class="row ">
                                <div class="col-md-8">
                                    <div class="card card-block">
                                        <div class="card-body ml-auto">
                                            <button class="btn btn-link">Удалить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
        @endif
    </div>
@endsection
