{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('image', 'Imagen') }}
	{{ Form::file('image') }}
</div>
<div class="form-group">
	{{ Form::label('category_id', 'Categoría:') }}
	{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div> 
<div class="form-group">
    {{ Form::label('name', 'Título del artículo') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
	<div>
		{{ Form::label('status', 'Status') }}
	</div>
	<label id="status" class="col-sm-2">
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
	<label id="status" class="col-sm-2">
		{{ Form::radio('status', 'DRAFT') }} Borrador
	</label>
</div>
<div class="form-group">
	{{ Form::label('tags', 'Etiquetas') }}
	<div>
	@foreach($tags as $tag)
		<label class="col-sm-2">
			{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
		</label>
	@endforeach
	</div>
</div>
<div class="form-group">
    {{ Form::label('excerpt', 'Resumen') }}
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a href="{{ URL::previous() }}" class="btn btn-sm btn-secondary float-right"> Regresar</a>
</div>

@section('scripts')
	<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
	<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
	<script>
		$(document).ready(function(){
		    $("#name, #slug").stringToSlug({
		        callback: function(text){
		            $('#slug').val(text);
		        }
		    });

		    CKEDITOR.config.height = 400;
			CKEDITOR.config.width  = 'auto';

			CKEDITOR.replace('body');
		});
	</script>
@endsection