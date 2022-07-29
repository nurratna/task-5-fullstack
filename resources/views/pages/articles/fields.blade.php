<!-- Name Field -->
<div class="form-group">
    {!! Form::label('title', 'Title :') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => true]) !!}
    @error('title')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    {!! Form::label('content', 'Content :') !!}
    {!! Form::text('content', null, ['class' => 'form-control', 'required' => true]) !!}
    @error('content')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>


<!-- Document Field -->
<div class="form-group mt-3">
    <label for="file">Image :</label>
    <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="form-control custom-file-input" name="image" id="image" accept="">
        </div>
    </div>
    @error('image')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="form-group mt-3">
    {!! Form::label('category_id', 'Category :') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'placeholder'=>'--- Pilih Opsi ---']) !!}
    @error('category_id')
        <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Submit Field -->
<div class="form-group mt-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-danger">Cancel</a>
</div>
