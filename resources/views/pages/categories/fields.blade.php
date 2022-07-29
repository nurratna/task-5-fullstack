<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name :') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    @error('name')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Submit Field -->
<div class="form-group mt-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('categories.index') !!}" class="btn btn-danger">Cancel</a>
</div>
