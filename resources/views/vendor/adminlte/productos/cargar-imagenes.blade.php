@extends('adminlte::layouts.app')


@section('main-content')
	




     <div class="container">
        <div class="row"    >
            <div class="col-lg-11">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Dropzone
                </div>
                <div class="panel-body">

                  <form file="true"  method="POST" action="{{ url('/cargar_imagenes') }}" class="dropzone" id="my-dropzone" enctype="multipart/form-data">
                     {{ csrf_field() }}
                  </div>
                      <div class="dropzone-previews">
                        
                      </div>
                     <button type="submit" id="submit" class="btn btn-success">Subir imagenes</button>
                  </form>
         
        </div>
        </div>
    </div>


@endsection

@section('script-pagina')

<script src="{{ url ('/js/dropzone.js') }}" type="text/javascript"></script>

<script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: true,
            maxFilezise: 10,
            maxFiles: 100,
            acceptedFiles: '.png,.jpg',
            
            init: function() {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e){
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                
                
                this.on("complete", function(file) {
                    myDropzone.removeFile(file);
                });
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>

@endsection