@extends('layout.master')

@section('title', 'Blogs')
@section('content')

    <section class="mt-5 text-center">
        @include('includes.header')
    </section>

    <section class="mt-5">
        @include('includes.blog-list', ["pageName"=>'blogList'])
    </section>

    
    
@endsection
