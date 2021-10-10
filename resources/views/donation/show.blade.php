@extends('layouts.app')

@section('template_title')
    {{ $donation->name ?? 'Show Donation' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Donation</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('donation.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Donation Amount:</strong>
                            {{ $donation->donation_amount }}
                        </div>
                        <div class="form-group">
                            <strong>Institution:</strong>
                            {{ $institution->name_institution }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $user->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
