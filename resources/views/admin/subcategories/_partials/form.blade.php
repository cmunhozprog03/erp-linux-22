<div class="form-group">
  {!! Form::label('Nome', null) !!}
  {!! Form::text('name', null, ['class' => 'form-control txt-input-upper
  ']) !!}
  @error('name')
      <div class="text-danger">{{ $message }}</div>
  @enderror
</div>
<div class="form-group">
  {!! Form::label('Descrição', null) !!}
  {!! Form::textarea('description', null, ['class' => 'form-control txt-input-upper', 'rows' => '5']) !!}
  @error('description')
      <div class="text-danger">{{ $message }}</div>
  @enderror
</div>
<div class="row justify-content-between">
  <div class="form-group">
    {!! Form::label('Imagem', null) !!}
    <br>
    {!! Form::file('picture') !!}  
      @error('picture')
        <div class="text-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    {{-- {!! Form::label('ATIVO?', null, ['class' => 'font-weigth-bold']) !!} --}}
    <p class="txt-input-upper">ATIVO?</p>

    <label>
      {!! Form::radio('active', 1, true) !!}
      SIM
    </label>
    <label>
      {!! Form::radio('active', 2) !!}
      NÃO
    </label>
  </div>
</div>
