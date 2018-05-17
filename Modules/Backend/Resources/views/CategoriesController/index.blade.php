@extends('backend::layouts.app')

@section('title') | Catégories @endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Categories
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('Backend::home')}}"><i class="fa fa-dashboard"></i> Administration</a></li>
                <li class="active">Categories</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-7">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une catégorie</h3>
                        </div>
                        <form role="form" action="{{route('Backend::CategoriesController.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Nom de la catégorie</label>
                                    <input type="text" class="form-control" name="title" placeholder="Ma super catégorie">
                                </div>
                                <div class="form-group">
                                    <label name="parent_id">Parent</label>
                                    <select name="parent_id"
                                            class="form-control select2"
                                            style="width: 100%;"
                                            data-placeholder="Selection d'un parent"
                                            >
                                            <option value="0">Pas de parent</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="only_for_adult"> Uniquement pour les adultes
                                    </label>
                                </div>

                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="only_for_premium"> Uniquements pour les premium
                                    </label>
                                </div>
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Ajouter la catégorie</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xs-5">
                    @include('backend::CategoriesController.categories_tree')
                </div>
            </div>
        </section>
    </div>
@endsection
@include('backend::layouts.components.select2')