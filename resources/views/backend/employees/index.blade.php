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
                                <h3 class="box-title">Employees List</h3>
                                <a href="{{ route('employees.create') }}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Employee</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th>Employee ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Salary</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $key=> $employee)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $employee->employee_id }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td>
                                                <span class="badge badge-{{ $employee->status == 'active' ? 'success' : ($employee->status == 'inactive' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($employee->status) }}
                                                </span>
                                            </td>
                                            <td>${{ number_format($employee->salary, 2) }}</td>
                                            <td>
                                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-info btn-sm">Edit</a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline-block;">
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