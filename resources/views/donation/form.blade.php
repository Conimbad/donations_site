<div class="box box-info padding-1">
 
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('donation_amount') }}
            {{ Form::text('donation_amount', $donation->donation_amount, ['class' => 'form-control' . ($errors->has('donation_amount') ? ' is-invalid' : ''), 'placeholder' => 'Donation Amount']) }}
            {!! $errors->first('donation_amount', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <!-- Institution select -->
        <div class="form-group">
            {{ Form::label('id_institution') }}
            {{ Form::select('id_institution', $institution, $donation->id_institution, ['class' => 'form-control' . ($errors->has('id_institution') ? ' is-invalid' : ''), 'placeholder' => 'Select institution you want donate']) }}
            {!! $errors->first('id_institution', '<div class="invalid-feedback">:message</p>') !!}
        </div>

        <!-- Name user -->
        <div class="form-group">
            {{ Form::label('id_user') }}
            {{ Form::select('id_user', $user, $donation->id_user, ['class' => 'form-control' . ($errors->has('id_user') ? ' is-invalid' : ''), 'placeholder' => 'User name']) }}
            {!! $errors->first('id_user', '<div class="invalid-feedback">:message</p>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
            <button type="submit" class="btn btn-primary">DONATE</button>
    </div>
    
</div>