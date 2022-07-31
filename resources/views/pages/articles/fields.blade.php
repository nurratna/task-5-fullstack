<div class="form-group row">
    {!! Form::label('title', 'Title :', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => true]) !!}
        @error('title')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label('content', 'Content :', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => true]) !!}
        @error('content')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="file" class="col-sm-3 col-form-label">Image :</label>
    <div class="col-sm-9">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="image" id="image" accept="">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        @error('image')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
  </div>

<div class="form-group row">
    {!! Form::label('category_id', 'Category :', ['class' => 'col-sm-3 col-form-label']) !!}
    <div class="col-sm-9">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder'=>'--- Pilih Opsi ---']) !!}
        @error('category_id')
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </div>
    
</div>

<!-- Submit Field -->
<div class="form-group row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-9">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('articles.index') !!}" class="btn btn-danger">Cancel</a>
    </div>
</div>
