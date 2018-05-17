<div class="row">

    <div id="preview-template" style="display:none;">
        <div class="dz-preview dz-file-preview">
            <div class="dz-image"><img data-dz-thumbnail=""></div>

            <div class="dz-details">
                <div class="dz-size"><span data-dz-size=""></span></div>
                <div class="dz-filename"><span data-dz-name=""></span></div>
            </div>
            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
            <div class="dz-success-mark"><span>✔</span></div>
            <div class="dz-error-mark"><span>✘</span></div>
            <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

        </div>
    </div>

    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Ajouter des images</h3>
            <form action="{{route('attachments.store')}}" method="POST" class="dropzone" files="true" id="real-dropzone">
                <div class="fallback">
                    <input name="image" type="file" multiple />
                </div>
                <div class="dropzone-previews" id="dropzonePreview"></div>
            </form>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Images déjà uploadés</h3>
            <div class="row">
                @foreach($attachments as $attachment)
                    <div class="col-sm-12 col-md-4 col-lg-4" id="container{{$attachment->id}}">
                        <div class="thumbnail">
                            <a href="{{$attachment->url}}" target="_blank"><img src="{{$attachment->url}}" data-holder-rendered="true"></a>
                            <div class="caption" style="text-align: center;">
                                <p style="text-align: center">
                                    @if($category->image == $attachment->url)
                                        <a href="#" class="btn btn-primary">Définie pour l'affichage</a>
                                @else
                                    <form method="POST" action="{{route('Backend::CategoriesController.assignImage',$category->id)}}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="image" value="{{$attachment->url}}">
                                        <button class="btn btn-warning">Utiliser cette image</button>
                                    </form>
                                @endif
                                <br/>
                                <br/>
                                <button id="remove{{$attachment->id}}" class="btn btn-danger">Supprimer</button>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('backend::layouts.components.dropzone')

@push('js')
    <script>
        Dropzone.options.realDropzone = {

            uploadMultiple: false,
            parallelUploads: 100,
            maxFilesize: 100,
            addRemoveLinks: true,
            dictDefaultMessage: 'Uploader des images ici',
            dictFallbackMessage: 'Navigateur non supporté',
            dictFallbackText: 'Merci d\'utiliser le formulaire à coté en dessous de l\'upload comme dans le bon vieux temps.',
            dictInvalidFileType: 'Fichier invalide',
            dictFileTooBig: 'L\'image ne doit pas exceder 100 Mo',
            dictCancelUpload:'Annuler',
            dictRemoveFile: 'Supprimer',
            sending: function(file, xhr, formData) {
                formData.append("_token","{{csrf_token()}}");
                formData.append("attachable_id",'{{$category->id}}');
                formData.append("attachable_type","App\\Category");
                formData.append("image",file);
            },
            init:function() {

                this.on("success", function(file, responseText) {
                    file.id = responseText.id;
                    input = $('#images');
                    input_text = input.val();
                    input.val(input_text + file.id +',')
                });

                this.on("removedfile", function(file) {

                    $.ajax({
                        type: 'POST',
                        url: "{{route('attachments.delete')}}",
                        data: {id: file.id, _token: "{{csrf_token()}}"},
                        dataType: 'json',
                        success: function(data){
                            text = data.id+',';
                            input = $('#images');
                            input_text = input.val();
                            input.val(input_text.replace(text,''));
                        }
                    });

                } );
            },

            error: function(file, response) {
                if($.type(response) === "string")
                    var message = response; //dropzone sends it's own error messages in string
                else
                    var message = response.message;
                file.previewElement.classList.add("dz-error");
                _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
                _results = [];
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i];
                    _results.push(node.textContent = message);
                }
                return _results;
            },

            success: function(file,done) {
            }
        }

        @foreach($attachments as $attachment)
        $("#remove{{$attachment->id}}").click(function () {
            $.ajax({
                type: 'POST',
                url: "{{route('attachments.delete')}}",
                data: {id: "{{$attachment->id}}", _token: "{{csrf_token()}}"},
                dataType: 'json',
                success: function(data){
                    id = data.id;
                    $('#container{{$attachment->id}}').fadeOut(300, function(){ $(this).remove();});
                }
            });
        });
        @endforeach

    </script>
@endpush