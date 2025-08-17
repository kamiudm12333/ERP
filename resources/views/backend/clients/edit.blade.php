@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Edit Client</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col">

                                    <form method="post" action="{{ route('clients.update', $client->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="row">
                                            <div class="col-12">

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Client Name <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="name" class="form-control" value="{{ $client->name }}" required> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Company Name</h5>
                                                            <div class="controls">
                                                                <input type="text" name="company_name" class="form-control" value="{{ $client->company_name }}"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Email Address <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="email" name="email" class="form-control" value="{{ $client->email }}" required> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Phone Number</h5>
                                                            <div class="controls">
                                                                <input type="text" name="phone" class="form-control" value="{{ $client->phone }}"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Address</h5>
                                                            <div class="controls">
                                                                <textarea name="address" class="form-control" rows="3">{{ $client->address }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5>City</h5>
                                                            <div class="controls">
                                                                <input type="text" name="city" class="form-control" value="{{ $client->city }}"> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5>State</h5>
                                                            <div class="controls">
                                                                <input type="text" name="state" class="form-control" value="{{ $client->state }}"> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <h5>Zip Code</h5>
                                                            <div class="controls">
                                                                <input type="text" name="zip_code" class="form-control" value="{{ $client->zip_code }}"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Country</h5>
                                                            <div class="controls">
                                                                <input type="text" name="country" class="form-control" value="{{ $client->country }}"> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Status <span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="status" class="form-control" required>
                                                                    <option value="">Select Status</option>
                                                                    <option value="active" {{ $client->status == 'active' ? 'selected' : '' }}>Active</option>
                                                                    <option value="inactive" {{ $client->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                                    <option value="pending" {{ $client->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Total Business Value</h5>
                                                            <div class="controls">
                                                                <input type="number" name="total_business" class="form-control" step="0.01" min="0" value="{{ $client->total_business }}"> 
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <h5>Last Contact Date</h5>
                                                            <div class="controls">
                                                                <input type="date" name="last_contact_date" class="form-control" value="{{ $client->last_contact_date ? $client->last_contact_date->format('Y-m-d') : '' }}"> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h5>Notes</h5>
                                                            <div class="controls">
                                                                <textarea name="notes" class="form-control" rows="4" placeholder="Additional notes about the client">{{ $client->notes }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="text-xs-right">
                                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update Client">
                                        </div>
                                    </form>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection