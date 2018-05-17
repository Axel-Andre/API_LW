    <a href="#alertDelete{{$category->id}}" id="alertDelete{{$category->id}}" class="btn btn-danger waves-effect"><i class="fa fa-trash"></i> Supprimer la catégorie </a>
    <form id="formDelete{{$category->id}}" action="{{route('Backend::CategoriesController.destroy',$category->id)}}" method="POST" style="display: none;">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="DELETE">
    </form>


    @include('backend::layouts.components.sweetalert')
    @push('js')
        <script type="application/javascript">
            document.querySelector('#alertDelete{{$category->id}}').onclick = function(){
                swal({
                    title: "Confirmer la suppression",
                    text: "Cette catégorie sera définitivement supprimé ainsi que les différents événements qui lui sont assiociés !",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonText: 'Annuler',
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Continuer",
                    closeOnConfirm: true
                },function(isConfirm){if(isConfirm){document.getElementById('formDelete{{$category->id}}').submit();}});
            };
        </script>
    @endpush