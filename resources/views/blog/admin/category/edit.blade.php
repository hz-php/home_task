@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\BlogCategory $item */
    @endphp
    @if($item->exists)
        <form action="{{ route('blog.admin.categories.update', $item->id) }}" method="POST">
            @method('PATCH')
    @else
        <form action="{{ route('blog.admin.categories.store') }}" method="POST">
    @endif
        @csrf
                    <div class="container">
                        @php
                            /** @var \Illuminate\Support\ViewErrorBag $errors */
                        @endphp
                        @if($errors->any())
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $errors->first() }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.category.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.category.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                </form>
        @endsection
