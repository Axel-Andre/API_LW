@extends('backend::layouts.app')

@section('title') | Catégorie "{{$category->title}}" @endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Categorie "{{$category->title}}"
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('Backend::home')}}"><i class="fa fa-dashboard"></i> Administration</a></li>
                <li><a href="{{route('Backend::CategoriesController.index')}}"><i class="fa fa-dashboard"></i> Catégories</a></li>
                <li class="active">Categorie "{{$category->title}}"</li>
            </ol>
        </section>

        <section class="content">

                <div class="row">
                    @include('backend::layouts.parts.errors')
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#dashboard" data-toggle="tab">Vue globale</a></li>
                                <li><a href="#images" data-toggle="tab">Images</a></li>
                                <li><a href="#edit" data-toggle="tab">Modifier la catégorie</a></li>
                                <li><a href="#actions" data-toggle="tab">Actions</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="active tab-pane" id="dashboard">
                                    @include('backend::CategoriesController.show.global')
                                </div>
                                <div class="tab-pane" id="images">
                                    @include('backend::CategoriesController.show.images')
                                </div>
                                <div class="tab-pane" id="edit">
                                    @include('backend::CategoriesController.show.edit')
                                </div>
                                <div class="tab-pane" id="actions">
                                    @include('backend::CategoriesController.show.actions')
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
        </section>
    </div>
@endsection