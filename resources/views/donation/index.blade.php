@extends('layouts.app')

@section('template_title')
    Donation
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Your donations') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('donation.create') }}" class="btn btn-danger btn-sm float-right"  data-placement="left">
                                  {{ __('NEW DONATION') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Donation Amount</th>
										<th>Id Institution</th>
										<th>Id User</th>

                                        <!-- <th></th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @foreach ($donations as $donation)
                                        <tr>
                                            @if ($donation->id_user == $user_id)
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $donation->donation_amount }}</td>
											<td>{{ $donation->institution->name_institution }}</td>
											<td>{{ $donation->user->name }}</td>

                                            <!-- <td>
                                                <form action="{{ route('donation.destroy',$donation->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('donation.show',$donation->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('donation.edit',$donation->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td> -->
                                           @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $donations->links() !!}
            </div>
        </div>
    </div>
@endsection
