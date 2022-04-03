@section('title')
    @lang('site.jobs') | @lang('site.add_job')
@endsection
@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('site.add_job')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.jobs.index')}}">@lang('site.jobs')</a></li>
                        <li class="breadcrumb-item active">@lang('site.add_job')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">@lang('site.job')</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('partials._errors')

                    <form action="{{ route('dashboard.jobs.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <label>@lang('site.name')</label>
                                <input type="text" class="form-control" name="name" required value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>@lang('site.job_description')</label>
                            <textarea type="text" class="form-control" name="job_description" required rows="5">{{old('job_description')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>@lang('site.status')</label>
                            <?php $job_status = [
                                0 => 'Not Approved',
                                1 => 'Approved',
                            ]?>
                            <select name="status" class="form-control select2" style="width: 100%;" data-placeholder="Select Status" required>
                                <option value="">Select Status</option>
                                @foreach($job_status as $ids => $status)
                                    <option value="{{$ids}}">{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label>@lang('site.location')</label>
                                <input type="text" class="form-control" name="location" required value="{{old('location')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                                <label>@lang('site.salary')</label>
                                <input type="text" class="form-control" name="salary" required value="{{old('salary')}}">
                        </div>
                    </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                    <div class="col-md-12">

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>
                    </div>


                 </form><!-- end of form -->

                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
