@extends('frontend.layouts.app')

@section('content')

	@include('frontend.partials.portals.score')
    @include('frontend.partials.portals.timeline')

    @include('frontend.partials.portals.calendar')

    @include('frontend.partials.portals.events')

    @include('frontend.partials.portals.sys-alerts')

    @include('frontend.partials.portals.e-learning-moodle')

@endsection