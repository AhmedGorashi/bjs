@section('title')
    @lang('site.jobs') | @lang('site.edit_job')
@endsection
@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('site.edit_job')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.jobs.index')}}">@lang('site.jobs')</a></li>
                        <li class="breadcrumb-item active">@lang('site.edit_job')</li>
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
                    <h3 class="card-title">@lang('site.edit')</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @include('partials._errors')

                    <form action="{{ route('dashboard.jobs.update', $job->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('site.job_status')</label>
                            <select name="status" class="form-control select2" style="width: 100%;" data-placeholder="Select job Status" required>
                                <option value="">Select Job Status</option>
                                <option value="0" @if($job->status == 0) selected @endif>{{'Open'}}</option>
                                <option value="1" @if($job->status == 1) selected @endif>{{'Close'}}</option>
                            </select>
                        </div>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                    </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> @lang('site.update')</button>
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
