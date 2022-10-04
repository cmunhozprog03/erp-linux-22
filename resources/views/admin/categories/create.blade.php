@extends('adminlte::page')

@section('title', 'Nova Categoria')

{{-- @section('content_header')
    <h1>Nova Categoria</h1>
@stop --}}

@section('content')
    {!! Form::open(['route' => 'admin.categories.store', 'autocomplete' => 'off', 'files' => true]) !!}
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-6 mt-2">
          <div class="w3-card-4">
            <header class="w3-container w3-dark-gray">
              <h3>NOVA CATEGORIA</h3>
            </header>
            <div class="w3-container">
              @include('admin.categories._partials.form')

            </div>
            <footer>
              <div class="row justify-content-around">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark mb-3">CANCELAR</a>
                {!! Form::submit('SALVAR', ['class' => 'btn btn-dark mb-3']) !!}
              </div>
            </footer>
          </div>
        </div>
      </div>

    {!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@stop

@section('js')
    
@stop