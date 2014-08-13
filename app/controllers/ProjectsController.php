<?php

class ProjectsController extends \BaseController
{

	/**
	 * Display a listing of projects
	 *
	 * @return Response
	 */
	public function index()
	{
		$projects = Project::orderby('created_at', 'desc')->get();

		return View::make('projects.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new project
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
	}

	/**
	 * Store a newly created project in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Project::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$project = new Project();

		$filename = md5(Input::get('name'));
		$dir      = 'uploads/';


		// Save desktop
		if (Input::hasFile('desktop_file')) {

			$desktop_orig  = $dir . $filename . '_desktop_o.jpg';
			$desktop_small = $dir . $filename . '_desktop_s.jpg';

			Image::make(Input::file('desktop_file'))
				->save($desktop_orig);

			Image::make(Input::file('desktop_file'))
				->resize(500, NULL, function ($constraint) {
					$constraint->aspectRatio();
				})
				->save($desktop_small);

			$project->desktop = '/' . $desktop_small;

		}


		if (Input::hasFile('mobile_file')) {

			// Save mobile

			$mobile_orig  = $dir . $filename . '_mobile_o.jpg';
			$mobile_small = $dir . $filename . '_mobile_s.jpg';

			Image::make(Input::file('mobile_file'))
				->save($mobile_orig);

			Image::make(Input::file('mobile_file'))
				->resize(300, NULL, function ($constraint) {
					$constraint->aspectRatio();
				})
				->save($mobile_small);

			$project->mobile = '/' . $mobile_small;
		}


		$project->name        = $data['name'];
		$project->description = $data['description'];
		$project->url         = $data['url'];
		$project->employer    = isset($data['employer']) ? $data['employer'] : false;

		$project->save();

		return Redirect::route('home');
	}

	/**
	 * Display the specified project.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		return Project::findOrFail($id);
	}

	/**
	 * Show the form for editing the specified project.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);

		return View::make('projects.edit', compact('project'));
	}

	/**
	 * Update the specified project in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Project::$rules);

		if ($validator->fails()) {
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$project->update($data);

		return Redirect::route('projects.index');
	}

	/**
	 * Remove the specified project from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		Project::destroy($id);

		return Redirect::route('projects.index');
	}

}
