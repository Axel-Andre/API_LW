<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AssignImageRequest;
use App\Http\Requests\Backend\CreateCategoryRequest;
use App\Http\Requests\Backend\UpdateCategoryRequest;

class CategoriesController extends Controller
{

    public $_template = 'default::CategoriesController.';
    public $_route = 'defaults::CategoriesController.';

    public function index()
    {
        $categories = Category::orderBy('position','ASC')->get();
        return view($this->_template.'index',compact('categories'));
    }

    public function show(Category $category)
    {
        $attachments = $category->attachments;
        $categories = Category::orderBy('position','ASC')->get();
        return view($this->_template.'show',compact('category','attachments','categories'));
    }

    public function edit(UpdateCategoryRequest $updateCategoryRequest, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'title' => $updateCategoryRequest->title,
            'parent_id' => $updateCategoryRequest->parent_id,
            'only_for_adult' => (($updateCategoryRequest->only_for_adult == 'on') ? true : false),
            'only_for_premium' => (($updateCategoryRequest->only_for_premium == 'on') ? true : false)
        ]);
        if($category->parent_id != 0){
            $parent = Category::where('id',$category->parent_id)->first();
            $parent->have_child = true;
            $parent->save();
        }
        return redirect()->route($this->_route.'show',$id)->with('success',"La catégorie à correctement été mise à jour.");
    }

    public function store(CreateCategoryRequest $categoryRequest)
    {
        $categories = Category::where('parent_id',$categoryRequest->get('parent_id'))->orderBy('position','asc')->get();
        $position = count($categories) + 1;
        Category::create([
            'title' => $categoryRequest->title,
            'parent_id' => $categoryRequest->parent_id,
            'position' => $position,
            'image' => '',
            'have_child' => false,
            'only_for_adult' => (($categoryRequest->only_for_adult == 'on') ? true : false),
            'only_for_premium' => (($categoryRequest->only_for_premium == 'on') ? true : false)
        ]);
        if($categoryRequest->parent_id != 0){
            $parent = Category::where('id',$categoryRequest->parent_id)->first();
            $parent->have_child = true;
            $parent->save();
        }
        return redirect()->route($this->_route.'index')->with('success', "La catégorie à bien été créer.");
    }

    public function destroy(Category $category)
    {
		if($category->have_child){
			return redirect()->back()->with('danger','la catégorie à encore des enfants !');
		}
		if($category->parent_id != 0){
        	if(Category::where('parent_id','=',$category->parent_id)->count() == 1){
            	$parent = Category::where('id',$category->parent_id)->first();
            	$parent->have_child = false;
            	$parent->save();
        	}
		}
        Category::destroy($category->id);
        return redirect()->route($this->_route.'index')->with('danger',"La catégorie à bien été supprimée");
    }

    public function move_up(Category $category)
    {
        $before_category = Category::where('parent_id',$category->parent_id)->where('position',$category->position-1)->first();
        if($category->position > 1){
            $category->position--;
            $before_category->position++;
            $category->save();
            $before_category->save();
        }
        return redirect()->route($this->_route.'index')->with('success', "La catégorie à bien été bougée.");
    }

    public function move_down(Category $category)
    {
        if($category->position != Category::where('parent_id',$category->parent_id)->count()){
            $after_category = Category::where('parent_id',$category->parent_id)->where('position',$category->position+1)->first();
            $after_category->position--;
            $after_category->save();
            $category->position++;
            $category->save();
        }
        return redirect()->route($this->_route.'index')->with('success', "La catégorie à bien été bougée.");
    }

    public function assignImage(AssignImageRequest $request,$id)
    {
        $category = Category::findOrFail($id);
        if($request->get('image') != ''){
            $category->image = $request->get('image');
        }else{
            $category->image = $this->image;
        }
        $category->save();
        return redirect()->route($this->_route.'show',$id)->with('success',"L'image à bien été assignée.");
    }

}