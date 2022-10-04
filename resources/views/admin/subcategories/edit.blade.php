@extends('adminlte::page')

@section('title', 'Editar Categoria')

{{-- @section('content_header')
    <h1>Nova Categoria</h1>
@stop --}}

@section('content')
    {!! Form::model($category, ['route' => ['admin.categories.update', $category->url], 'method' => 'put', 'files' => true]) !!}
      <div class="row justify-content-center">
        <div class="col-sm-12 col-md-8 col-lg-8 mt-2">
          <div class="w3-card-4">
            <header class="w3-container w3-dark-gray">
              <h3>EDITAR CATEGORIA</h3>
            </header>
            <div class="w3-container">
              <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-6">
                  @include('admin.categories._partials.form')
                </div>
                <div class="col-sm-12 col-md-4 col-lg-6">
                  <div>
                    <img class="img-fluid mt-2" src="{{ url("storage/{$category->picture}") }}" alt="" >
                  </div>
                  
                </div>
              </div>
              
              

            </div>
            <footer>
              <div class="row justify-content-around">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-dark mb-3">CANCELAR</a>
                {!! Form::submit('ATUALIZAR', ['class' => 'btn btn-dark mb-3']) !!}
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