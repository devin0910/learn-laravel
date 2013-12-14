<?php

class BookController extends BaseController {

	public function category($category = "computers")
	{
		 return "Books in the {$category} category.";
	}

	public function view($id)
	{
		return View::make('book.view', array('id' => $id));
		return "My id is $id";
	}
}