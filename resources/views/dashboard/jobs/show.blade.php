@section('title')
    @lang('site.jobs') | @lang('site.show_job')
@endsection
@extends('layouts.dashboard.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('content')
<style>
    @media print {
        .no-print {
            visibility: hidden;
        }
        .checkbox{
            display: none;
        }
        .main-footer{
            display: none;
        }
        .zzz{
            display: none;
        }
        .no-print{
            display: none;
        }
        @page { margin: 0; }
        body { margin: 1.6cm; }
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('site.show_job')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard.jobs.index')}}">@lang('site.jobs')</a></li>
                        <li class="breadcrumb-item active">@lang('site.show_job')</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-2">
                    <a onclick="myFunction()" class="btn btn-info no-print" style="margin-bottom: 4%;color: #fff;float: right"><i class="fa fa-print"></i> @lang('site.print')</a>

                </div>
            </div>
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title no-print">@lang('site.show')</h3>
                    <div class="card-tools no-print">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">@lang('site.company_name')</th>
                            <td>{{@$job->company->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.title')</th>
                            <td>{{$job->title}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.status')</th>
                            @if($job->status = 0)
                            <td>{{'Open'}}</td>
                            @else
                            <td>{{'Close'}}</td>
                            @endif
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.posted_in')</th>
                            <td>{{date("Y/m/d",strtotime($job->created_at))}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.job_type')</th>
                            <td>{{$job->type}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.job_category')</th>
                            <td>{{$job->category}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.city')</th>
                            <td>{{$job->city}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.min_salary')</th>
                            <td>{{$job->min_salary}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.max_salary')</th>
                            <td>{{$job->max_salary}}</td>
                        </tr>
                        <tr>
                            <th scope="row">@lang('site.description')</th>
                            <td>{!! $job->description !!}</td>
                        </tr>
                        

                        </tbody>
                    </table>
                </div>
            </div>
             <!-- Content Wrapper. Contains page content -->
             <div class="container-fluid">
                <div class="row">
                  <div class="col-12">
                    <div class="card-body">
                        <h4 class="alert alert-info" style="background-color: rgb(212, 127, 127)">Applicants</h4>
                    </div>
                  </div>
                </div>
             </div>
            <div class="container-fluid">
                <div class="row">
                    @if(!$applicants->isEmpty())
                    @foreach($applicants as $applicant)
                <div class="col-6">
                    <!-- Default box -->
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Name : {{$applicant->name}}</h3>
                    </div>
                    <div class="card-body">
                        Email : {{$applicant->email}} <br>
                        Phone : {{$applicant->phone}}<br>
                        <a href="{{route('site.download_cv',$applicant->file)}}" class="btn btn-primary" style="margin-top: 2%"><i class="icon-feather-file-text"></i> Download CV</a>

                    </div>
                    
                    </div>
                    <!-- /.card -->
                </div>
                @endforeach
                @else
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
            
                    <div class="card-body">
                        No Applicants Applied for This Job ..
                    </div>
                    
                    </div>
                    <!-- /.card -->
                </div>
                @endif
                
                </div>
            </div>
 
  <!-- /.content-wrapper -->
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<script>
    function myFunction() {
        window.print();
    }
</script>
@endsection
