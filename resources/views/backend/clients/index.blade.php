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
                                <h3 class="box-title">Clients List</h3>
                                <a href="{{ route('clients.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Client</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Name</th>
                                            <th>Company</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                            <th>Total Business</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($clients as $key=> $client)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->company_name ?? 'N/A' }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->phone ?? 'N/A' }}</td>
                                            <td>
                                                <span class="badge badge-{{ $client->status == 'active' ? 'success' : ($client->status == 'inactive' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($client->status) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($client->total_business, 2) }}</td>
                                            <td>
                                                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>

@endsection