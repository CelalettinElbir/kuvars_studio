@extends('frontendLayout.master')
@include('frontendlayout.frontNav')


@section('content')
    <div class="hero-2 "
        style="background-image: url('{{ asset('images/resource') }}/{{ $project->project_photos->first()->image_path }}');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mx-auto ">
                    <h1 class="mb-5 text-center"><span>{{ $project->name }}</span></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="section sec-3">
        <div class="container">
            <div class="row mb-5 justify-content-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="owl-carousel project-photo owl-theme">

                        @foreach ($project->project_photos as $item)
                            <div class="item">
                                <img src="{{ asset('images/resource') }}/{{ $item->image_path }}" alt="{{ $item->id }}">
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-lg-5">
                    <h2 class="heading">Hakkında </h2>
                    <p>Delectus voluptatum distinctio quos eius excepturi sunt pariatur, aut, doloribus officia ea molestias
                        beatae
                        laudantium, quam odio ipsum veritatis est maiores velit quasi blanditiis et natus accusamus itaque.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae placeat, unde sequi quas ipsum illo?
                        Commodi
                        accusantium, sit eveniet? Maiores tempora corporis ea nostrum magnam similique optio autem, dolor
                        incidunt?
                    </p>
                    <p>Recusandae quam dicta repellat consequatur, facilis magnam minus unde, asperiores voluptatibus
                        temporibus
                        obcaecati, nihil libero. Maxime consectetur asperiores excepturi quidem deleniti, autem incidunt?
                        Error
                        nisi, eius fugiat expedita quia cupiditate!</p>
                    <p><a href="{{route("projects.vr",$project->id)}}" class="btn btn-primary">VR tur</a></p>

                </div>
            </div>
        </div>

    </div>
    @if ($project->plan_photos->isNotEmpty())
        <section class="section sec-1">
            <div class="container">

                <div class="row mb-5">
                    <div class="col-lg-6">
                        <h2 class="heading">Plan Fotoları </h2>
                    </div>

                    <div class="owl-carousel plan-photo owl-theme">

                        @foreach ($project->plan_photos as $photo)
                            <div class="item">
                                <img src="{{ asset('plan/photos') }}/{{ $photo->img_path }}" alt="{{ $photo->id }}">
                            </div>
                        @endforeach




                    </div>


                </div>
            </div>

        </section>
    @endif


@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush

@push('js')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $('.owl-carousel.plan-photo').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        $('.owl-carousel.project-photo').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
@endpush

{{-- 
    <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div> --}}
{{-- @endsection --}}
