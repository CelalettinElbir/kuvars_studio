@extends('backend.layouts.master')


@include('partials.flash')



@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h2>Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-info mt-2 mb-2">yeni proje oluştur.</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>project_html</th>
                                <th>images</th>
                                <th>aksiyonlar</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>project_html</th>
                                <th>images</th>
                                <th>aksiyonlar</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            {{-- {{ dd($Projects[14]->project_photos) }} --}}

                            @foreach ($Projects as $Project)
                                <tr>
                                    <td>{{ $Project->name }}</td>
                                    <td>{{ $Project->project_html }}</td>
                                    <td><img src="{{ asset('images/resource') }}/{{ $Project->project_photos->first()->image_path }}"
                                            style="height:100px ; width: 100px;" alt=""></td>
                                    <th class="d-flex gap-5">



                                        <form action="{{ route('admin.projects.delete', $Project->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa fa-times"
                                                    aria-hidden="true"></i></button>
                                        </form>

                                        <form action="{{ route('admin.projects.edit', $Project->id) }}">
                                            <button class="btn btn-info"><i class="fa fa-edit"
                                                    aria-hidden="true"></i></button>

                                        </form>
                                        <form action="{{ route('projects.detail', $Project->id) }}">
                                            <button class="btn btn-warning"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></button>

                                        </form>
                                    </th>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
@endsection
