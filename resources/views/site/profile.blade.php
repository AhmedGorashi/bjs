
@section('title')
@lang('site.bjs') | @lang('site.index')
@endsection
@extends('layouts.site.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@section('content')

     <!-- Hero Area End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">About</h2>
                </div>
                <div class="col-lg-12">
                        <form class="form-contact contact_form" action="{{ route('site.profile_store') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">

                            {{ csrf_field() }}
                            {{ method_field('post') }}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control valid" name="name"  value ="{{$user->name}}" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email"  value ="{{$user->email}}" type="text" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="mobile"  value ="{{$user->mobile}}" type="number">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="cv" cols="30" rows="9">{{$user->cv}}</textarea>
                                </div>
                            </div>
                            <div class="col-12" style="margin-top:5%">
                                <h2 class="contact-title">Work Experience</h2>
                            </div>
                            @if($user_experiences->count() == 0)
                            <div class="col-12">
                                <h6>No Experience Added</h6>
                            </div>
                            @else
                            @foreach ($user_experiences as $user_experience)
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="job_title" value ="{{$user_experience->job_title}}" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="company_name" value ="{{$user_experience->company_name}}" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="date_started" value ="{{$user_experience->date_started}}" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="industry" value ="{{$user_experience->industry}}" type="text">
                                </div>
                            </div>
                            @endforeach
                            @endif

                            <div class="container mt-3" style="margin-bottom:5%">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Add New Experience
                                </button>
                            </div>


                            <div class="col-12" style="margin-top:5%">
                                <h2 class="contact-title">Education</h2>
                            </div>
                            <div class="col-sm-12">
                                <select name="user_education" class="form-control valid" style="width: 100%;" data-placeholder="Select Status" required>
                                    <?php
                                        $user_education = ['Highest Level','School',"Date Completed"];
                                    ?>
                                    <option value="">Select Education</option>
                                    <?php
                                    $user_edu = App\Site\UserEducation::where('user_id',auth()->user()->id)->first();

                                    ?>
                                    @if($user_edu != null)
                                    @foreach($user_education as $education)
                                        <option value="{{$education}}" @if($user_edu->name == $education) selected @endif>{{$education}}</option>
                                    @endforeach
                                    @else

                                    @foreach($user_education as $education)

                                    <option value="{{$education}}">{{$education}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-contact contact_form" action="{{ route('site.user_experience') }}" method="post" novalidate="novalidate" enctype="multipart/form-data">

                {{ csrf_field() }}
                {{ method_field('post') }}
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">



                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="job_title" type="text"  placeholder="Job Title">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="company_name"  type="text"  placeholder="Company Name">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="date_started" placeholder="Date Started" type="text">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control valid" name="industry" placeholder="Industry" type="text">
                        </div>
                    </div>
                </div>

            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Save</button>
            </div>
        </form>


        </div>
        </div>
    </div>
<!-- ================ contact section end ================= -->

@endsection
