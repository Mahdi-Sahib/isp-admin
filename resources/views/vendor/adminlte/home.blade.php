@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
    @include('adminlte::layouts.partials.notifications')
	@include('adminlte::layouts.partials.pageheader')
			{{ trans('adminlte_lang::message.logged') }}
	@include('adminlte::layouts.partials.pagefooter')
@endsection
