<form class="form-horizontal" role="form" action="{{route('Backend::CategoriesController.edit',$category->id)}}" method="POST">

    {{csrf_field()}}

    <div class="box-body">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
            <label for="title" class="col-sm-2 control-label">Nom de la catégorie</label>
            <div class="div col-sm-10">
                <input
                        id="title"
                        type="text"
                        class="form-control"
                        name="title"
                        value="{{$category->title}}"
                        required>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('parent_id') ? ' has-error' : '' }}">
            <label class="col-sm-2 control-label" name="parent_id">Catégorie parente</label>
            <div class="col-sm-10">
                <select name="parent_id"
                        class="form-control select2"
                        style="width: 100%;"
                        data-placeholder="Selection du parent">
                    @if($category->parent_id == 0)
                        <option value="0" selected>Pas de parent</option>
                    @else
                        <option value="0">Pas de parent</option>
                    @endif
                    @foreach($categories as $cat)
                        @if($cat->id != $category->id && $cat->parent_id != $category->id)
                            @if($category->parent_id == $cat->id)
                                <option value="{{$cat->id}}" selected>{{$cat->title}}</option>
                            @else
                                <option value="{{$cat->id}}">{{$cat->title}}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('teachers'))
                    <span class="help-block">
                        <strong>{{ $errors->first('parent_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('only_for_adult') ? ' has-error' : '' }}">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input
                            type="checkbox"
                            name="only_for_adult"
                            @if($category->only_for_adult)
                                checked
                            @endif
                        > Uniquement pour les adultes
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('only_for_premium') ? ' has-error' : '' }}">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input
                            type="checkbox"
                            name="only_for_premium"
                            @if($category->only_for_premium)
                                checked
                            @endif
                        > Uniquement pour les premium
                    </label>
                </div>
            </div>
        </div>

    </div>

    <div class="box-footer">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-warning">Modifier la catégorie</button>
        </div>
    </div>
</form>


@include('backend::layouts.components.select2')