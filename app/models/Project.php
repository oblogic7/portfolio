<?php

class Project extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name' => 'required',
        'description' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'description'];

}