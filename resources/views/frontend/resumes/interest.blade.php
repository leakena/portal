@extends('frontend.layouts.app')

@section('content')
    <div class="row">
        {{-- main content --}}
        <div class="col-md-12">
            <div class="main-wrapper">

                @include('frontend.partials.resumes.interests')

                <div class="section-footer">
                    <div class="btn-group">
                        <a href="{{ url()->previous() }}" class="btn btn-default pull-left"><i class="fa fa-arrow-left"></i> Back</a>
                        <a href="#" class="btn btn-primary pull-left">Save</a>
                    </div>
                </div>
            </div><!--//main-body-->
        </div>
    </div>
@endsection