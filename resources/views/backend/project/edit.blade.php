@extends('backend.layouts.master')

@include('partials.flash')
@section('content')
    <div class="container-fluid">
        <form method="post" action="{{ route('admin.projects.update',$project->id) }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="project_name">
                <label for="project_name">
                    <h4>Proje ismi</h4>
                </label>
                <input type="text" name="project_name" class="form-control"  value="{{$project->name }}">


            </div>

            


            <div class="form-group">
                <label for="project_html">html</label>
                <textarea class="form-control" name="html" id="project_html" rows="3">{{{$project->project_html }}}</textarea>
            </div>
            <div class="form-group">
                <label for="file_path">resim yükle</label>
                <input type="file" class="form-control" id="file_path" name="file_path[]" multiple>
            </div>




            <div class="post_button">
                <button type="submit" class="btn btn-success mt-3 mb-3">Kaydet</button>
            </div>
        </form>


    </div>
@endsection
