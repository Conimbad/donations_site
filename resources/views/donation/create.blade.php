@extends('layouts.app')

@section('template_title')
    Create Donation
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Donation</span>
                    </div>
                    <div class="card-body">
                      @if ($val === true && $what === true)
                        <div class="alert alert-danger" role="alert">
                          Sorry, you can not donate for this month. Thanks.
                        </div>
                        @else
                          <form 
                              method="POST" 
                              action="{{ route('donation.store') }}"  
                              role="form" 
                              enctype="multipart/form-data">
                              @csrf

                            @include('donation.form')

                        </form>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
