@extends('layouts.main')

@section('content')

	My id is {{ $id }}!

@stop

{{-- 
 @section('css')
	@parent
	{{ HTML::style('abc.css') }}
@stop 
--}}