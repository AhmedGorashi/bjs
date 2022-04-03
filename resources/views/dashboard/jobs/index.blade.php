@section('title')
    @lang('site.jobs') | @lang('site.show_jobs')
@endsection
@extends('layouts.dashboard.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('content')

<style>
    button.dt-button, div.dt-button, a.dt-button, input.dt-button{
        position: relative;
        display: inline-block;
        box-sizing: border-box;
        margin-right: 0.333em;
        margin-bottom: 0.333em;
        padding: 0.5em 1em;
        border: 1px solid rgba(0,0,0,0.3);
        border-radius: 2px;
        cursor: pointer;
        font-size: 0.88em;
        line-height: 1.6em;
        color: black;
        white-space: nowrap;
        background: linear-gradient(to bottom, rgba(230,230,230,0.1) 0%, rgba(0,0,0,0.1) 100%);

    }
</style>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('site.jobs')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">@lang('site.home')</a></li>
                        <li class="breadcrumb-item active">@lang('site.jobs')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($jobs->count() > 0)
                            <table class="table table-bordered table-hover" id="all-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.job_name')</th>
                                    <th>@lang('site.location')</th>
                                    <th>@lang('site.salary')</th>
                                    <th>@lang('site.status')</th>
                                    <th>@lang('site.posted_in')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>

                            </table>



                            @else

                                <h2>@lang('site.no_data_found')</h2>

                            @endif
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
    <script>
        $(function() {
            $('#all-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('dashboard.jobs-list') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'location', name: 'location' },
                    { data: 'salary', name: 'salary' },
                    { data: 'status', name: 'status' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' }
                ],
                dom: 'B<"clear">lfrtip',
                buttons: {
                    name: 'primary',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print']
                },


            });

        });
    </script>
