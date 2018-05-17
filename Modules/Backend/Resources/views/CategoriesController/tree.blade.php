@if($category->have_child)
    @php
    $c = $category;
    @endphp
    <ul>
        @foreach($categories as $category)
            @if($c->id == $category->parent_id)
                <li>
                    <span><i class="icon-folder-open"></i> {{$category->title}}</span>
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
@endif