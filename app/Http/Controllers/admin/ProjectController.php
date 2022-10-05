<?php

namespace App\Http\Controllers\admin;

use App\Models\Project;
use Illuminate\Http\Request;

use App\Models\project_photos;
use App\Http\Controllers\Controller;
use App\Models\planPhotos;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Projects = Project::all();

        return view("backend.project.index", compact("Projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.project.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->hasFile('img_path'));
        // dd($request->file('file_path')[0]->getClientOriginalName());
        $request->validate([
            'project_name' => 'required',
            'html' => 'required',
        ]);


        $Project = new Project();
        $Project->name = $request->project_name;
        $Project->project_html = $request->html;
        $Project->save();

        if ($request->hasFile("file_path")) {

            foreach ($request->file('file_path') as $item) {
                $image = new project_photos();


                $ogImage = Image::make($item->path());
                $ogImage->resize(720, 720);
                $imageName =  uniqid() . "." . $item->getClientOriginalExtension();
                $ogImage->save(public_path("images/resource/") . $imageName);
                $image->project_id = $Project->id;
                $image->image_path =  $imageName;

                $image->save();
            };
        }

        if ($request->hasFile("img_path")) {

            foreach ($request->file('img_path') as $item) {
                $image = new planPhotos();


                $ogImage = Image::make($item->path());
                $ogImage->resize(720, 720);
                // $ogImage->aspectRatio();
                $imageName =  uniqid() . "." . $item->getClientOriginalExtension();
                $ogImage->save(public_path("plan/photos/") . $imageName);
                $image->project_id = $Project->id;
                $image->img_path =  $imageName;

                $image->save();
            };
        }


        return redirect()->route("admin.projects.index")->with("message", "Proje başarıyla oluşturuldu.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view("backend.project.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);
        $project->name  = $request->project_name;
        $project->project_html = $request->html;

        $project->save();
        return redirect()->route("admin.projects.index")->with("message", "başarıyla güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        // dd($project);
        // Project::findOrFail($project->id)->delete();
        $deletedItem = Project::find($id);
        $deletedItem->delete();
        return redirect()->route("admin.projects.index")->with("message","başarıyla silindi");
    }
}
