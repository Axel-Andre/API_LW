<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\Api\CategoriesRessource;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{

    public function getCategoriesWithNoParents(){
        $categories = Category::where('parent_id','=',0)->orderBy('position','ASC')->get();
        return new CategoriesRessource($categories);
    }

    public function getCategoriesFromParent(Category $categorie){
        $categories = Category::where('parent_id','=',$categorie->id)->orderBy('position','ASC')->get();
        return new CategoriesRessource($categories);
    }

    public function getCategorie(Category $categorie){
        return new CategoriesRessource($categorie);
    }
}
