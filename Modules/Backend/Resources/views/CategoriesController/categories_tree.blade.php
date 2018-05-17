<div class="category-tree well">
    <ul>
        @foreach($categories as $category)
            @if($category->parent_id == 0)
                <li>
                    <span>@if($category->have_child)<i class="fa fa-folder-open"></i>@endif {{$category->title}}</span>
                    <div class="btn-group">
                        <a href="{{route('Backend::CategoriesController.moveup',$category->id)}}" class="btn btn-default btn-flat"><i class="fa fa-sort-up"></i></a>
                        <a href="{{route('Backend::CategoriesController.movedown',$category->id)}}" class="btn btn-default btn-flat"><i class="fa fa-sort-down"></i></a>
                        <a href="{{route('Backend::CategoriesController.show',$category->id)}}" class="btn btn-default btn-flat"><i class="fa fa-search"></i></a>
                    </div>
                    @include('backend::CategoriesController.tree',$category)
                </li>
            @endif
        @endforeach
    </ul>
</div>


@include('backend::layouts.components.categoriesTree')