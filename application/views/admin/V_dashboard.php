<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>ARSIP SURAT</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">

    <div class="row second-chart-list third-news-update">
        <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
            <div class="card o-hidden profile-greeting">
                <div class="card-body">
                    <div class="media">
                        <div class="badge-groups w-100">
                            <div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span>
                            </div>
                           
                        </div>
                    </div>
                    <div class="greeting-user text-center">
                        <div class="profile-vector"><img class="img-fluid" width="200px" height="200px"
                                src="<?php echo base_url('assets/images/' . $this->session->userdata('sess_foto')) ?>"
                                alt="">
                        </div>
                        <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i
                                    class="fa fa-check-circle f-14 middle"></i></span></h4>
                        <p><span> Welcome <?php echo $this->session->userdata('sess_fullname') ?></span>
                        </p>
                        <div class="whatsnew-btn"><a class="btn btn-primary">Profile</a></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
            <div class="card gradient-primary o-hidden">
                <div class="card-body">
                    <div class="setting-dot">
                    </div>
                    <div class="default-datepicker">
                        <div class="datepicker-here" data-language="en"></div>
                    </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span
                                class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span
                                class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span
                                class="dots dots7 dot-small-semi"></span><span
                                class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                            </span></span></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->