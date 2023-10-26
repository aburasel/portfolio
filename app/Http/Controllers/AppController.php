<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class AppController extends Controller
{
    private array $urls = ["" => "Home", "projects" => "Projects", "experience" => "Experience"];

    public function index(): View
    {
        $file_contents = File::get(storage_path("data/about.json"));
        $about_data_array = json_decode($file_contents, true);
        return view("home")->with('about_data_array', $about_data_array)->with('urls', $this->urls);
    }

    public function projects(): View
    {
        $file_contents = File::get(storage_path("data/projects.json"));
        $projects_array = json_decode($file_contents, true);
        return view("projects")->with('projects_array', $projects_array)->with('urls', $this->urls);
    }

    public function project_by_id(int $project_id)
    {
        $titles = ["name" => "Name", "language" => "Language", "description" => "Description","create_date" => "Create date"];
        $file_contents = File::get(storage_path("data/projects.json"));
        $projects_array = json_decode($file_contents, true);
        $project_ftiltered = array_filter($projects_array, function ($value, $key) use ($project_id) {
            return ($value['id'] == $project_id);
        }, ARRAY_FILTER_USE_BOTH);
        //echo '<pre>';print_r(reset($project_ftiltered));die();
        $project_details_array = reset($project_ftiltered);

        if ($project_details_array) {
            unset($project_details_array['id']);
            return view("single_project")->with('project_details_array',$project_details_array ) ->with('urls', $this->urls)->with('titles', $titles);
        }else{
            return '';
        }

    }
}