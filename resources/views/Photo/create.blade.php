@extends('layouts.main')

@section('content')
	<div class="callout primary">
<div class="row column">
<h1>Upload Photo</h1>
<p class="lead">Upload Photo ke galery</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<div class="main">
		{!! Form::open(array('action' => 'PhotoController@store', 'enctype' => 'multipart/form-data'))!!}
			{!! Form::label('title','Title') !!}
			{!! Form::text('title',$value = null, $attributes = ['placeholder' => 'Photo Title','name' => 'title']) !!}

			{!! Form::label('descripstion','Descripstion') !!}
			{!! Form::text('descripstion',$value = null, $attributes = ['placeholder' => 'Photo Descripstion','name' => 'descripstion']) !!}

			{!! Form::label('descripstion','Location') !!}
			{!! Form::text('location',$value = null, $attributes = ['placeholder' => 'Photo location','name' => 'location']) !!}

			{!! Form::label('image','Photo') !!}
			{!! Form::file('image') !!}

			<input type="hidden" name="gallery_id" value="{{ $gallery_id }}">

			{!! Form::submit('Submit',$attribut = ['class'=> 'button']) !!}
		{!! Form::close() !!}
	</div>
</div>
@stop 