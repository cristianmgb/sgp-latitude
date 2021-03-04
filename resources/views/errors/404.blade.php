@extends('errors::layout')

@section('image')
	<img src="{{ asset('svg/error-404.svg') }}" class="img-fluid" alt="imagen error 404">
@endsection

@section('title', __('404'))
@section('body-title', 'Página no encontrada')
@section('text', __('Lo sentimos, no podemos encontrar la página que busca. Por favor verifique la dirección introducida, inténtelo de nuevo o regresa al Dashboard.'))
@section('code', '404')