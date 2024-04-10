<?php


use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function()
{
    return redirect('/projects');
})->name('projects');

Route::get('/projects', function()
{
    $project=Auth::user()->projects;
    return view('/projects',['projects'=>$project]);
})->name('projects');
Route::post('/project', function(Request $request) {
    $project = new Project();
    $project->imeProjekta = $request->ime;
    $project->opisProjekta = $request->opis;
    $project->cijenaProjekta = $request->cijena;
    $project->posaoObavljen = $request->obavljen;
    $project->datum_Pocetka = $request->datumPocetka;
    $project->datum_Zavrsetka = $request->datumZavrsetka;
    $project->Voditelj = Auth::user()->getId();
    $project->save();

    $projectUser = new ProjectUser();
    $projectUser->user_id = Auth::user()->getId();
    $projectUser->project_id = $project->id;
    $projectUser->save();
    
    return redirect('/projects');
})->name('project');

Route::get('/newproject',function()
{
    return view('newproject');
})->name('newproject');

Route::get('/editproject/{project_id?}',function($project_id=null)
{
    $project=Project::find($project_id);
    return view('editproject',[
        'project'=>$project
    ]);
})->name('editproject');
Route::get('/editproject/{project_id?}', function ($project_id = null) {
    $project = Project::find($project_id);
    return view('editproject', [
        'project' => $project
    ]);
})->name('editproject');

Route::put('/saveproject/{project_id?}', function (Request $request, $project_id = null) {
    $project = Project::find($project_id);
    if ($project->leader == Auth::user()->getId()) {
        $project->imeProjekta = $request->ime;
        $project->opisProjekta = $request->opis;
        $project->cijenaProjekta = $request->cijena;
        $project->datum_Pocetka = $request->datumPocetka;
        $project->datum_Zavrsetka = $request->obavljen;
    }
    $project->posaoObavljen = $request->posaoObavljen;
    $project->save();
    return redirect('/projects');
})->name('saveproject');

Route::get('/users/{project_id?}', function ($project_id = null) {
    $users = User::orderBy('created_at', 'asc')->get();
    return view('users', [
        'users' => $users,
        'project_id' => $project_id
    ]);
})->name('users');

Route::post('/adduser', function (Request $request) {
    $project_user = new ProjectUser();
    $project_user->project_id = $request->project_id;
    $project_user->user_id = $request->user_id;
    $project_user->save();
    return redirect('/projects');
})->name('adduser');