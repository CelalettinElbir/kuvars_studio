@extends('frontendLayout.master')
@section('navbarColor')
    bg-dark
@endsection('navbarColor')
@include('frontendLayout.frontNav')

@section('content')
    <section class="section sec-3">
        <div class="container">
            <div class="row g-4">
                @foreach ($projects as $project)
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 ">
                        <div class="single-portfolio">
                            <a href="{{ route('projects.detail', $project->id) }}">
                                <img src="{{ asset('images/resource') }}/{{ $project->project_photos->first()->image_path }}"
                                    alt="Image" class="img-fluid">
                                <div class="contents">
                                    <h3>{{ $project->name }}</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>
@endsection
