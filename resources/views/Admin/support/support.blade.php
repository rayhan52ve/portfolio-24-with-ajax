@extends('Admin.partials.master')

@section('content')
<div class="container" style="margin-top:80px">
  <div class="row ">
    <div class="col-md-12">
      <div class="row g-2 mb-5">
          <div class="col-sm-3 col-xxl-3">
              <div class="card-body text-center d-flex flex-column justify-content-center align-items-center">
                  <div class="card border-info">
                      
                      <div class="list-group">
                          <h5 id="compose" href="#" class="list-group-item"><button class="btn btn-info btn-md">Compose</button></h4>
                          <a href="#" class="list-group-item list-group-item-action">
                              <div class="sw-5 d-inline-block position-relative me-3">
                                  <img src="{{asset(Auth::user()->image)}}" class="img-fluid rounded-xl" alt="thumb">
                                </div>
                               </a>
                        </div>
                  </div>
              </div>
          </div>
          <div id="composedTo" class="col-sm-9 col-xxl-3 mt-4 h-75 border-info">
              <div class="card-body">
                  <a href="#" id="composeBack" class="btn btn-info btn-sm float-end"><i class="fa-solid fa-xmark"></i></a>
              <form class="row g-3 needs-validation" name="EmailSupportForm" id="EmailSupportForm">
                  <div class="col-md-6">
                    <label for="email" class="form-label">To</label>
                    <input type="email" name="email" placeholder="email" class="form-control" id="email">
                  </div>
                  <div class="col-md-6">
                      <label for="subject" class="form-label">Subject</label>
                      <input type="text" class="form-control" placeholder="subject" name="subject" id="subject">
                    </div>
                 
                  <div class="col-md-12">
                      <label for="description" class="form-label">Your Query</label>
                      <textarea name="description" id="description" class="form-control" placeholder="write ..." cols="30" rows="10"></textarea>
                  </div>
                  <input type="file" class="form-control d-none" name="file_upload" id="file_upload">
                  <div class="col-4">
                    <button class="btn btn-primary" id="emailSupport" type="button">Send</button>
                    <label for="file_upload" class="btn btn-md btn-warning text-start"><i class="fa-solid fa-paperclip"></i></label>
                  </div>
                </form>
              </div>
          </div>
          <div id="emailTable" class="col-sm-9 col-xxl-3 mt-4 h-100 border-info ">
            
              <div class="card-body">
                <section class="scroll-section" id="responsiveTabs">
                  <!-- Responsive Tabs with Line Title Start -->
                  <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" id="lineTitleTabsContainer" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a class="nav-link active" data-bs-toggle="tab" href="#firstLineTitleTab" role="tab" aria-selected="true"><i class="fas fa-inbox"></i> Inbox</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" data-bs-toggle="tab" href="#secondLineTitleTab" role="tab" aria-selected="false"><i class="fas fa-paper-plane"></i> Send</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a class="nav-link" data-bs-toggle="tab" href="#thirdLineTitleTab" role="tab" aria-selected="false"><i class="fas fa-trash"></i> Trash</a>
                    </li>
                    <!-- An empty list to put overflowed links -->
                    <li class="nav-item dropdown ms-auto pe-0 d-none responsive-tab-dropdown">
                      <a
                        class="btn btn-icon btn-icon-only btn-background pt-0 bg-transparent pe-0"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <i data-acorn-icon="more-horizontal"></i>
                      </a>
                      <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
                    </li>
                  </ul>

                  <div class="card mb-5">
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="tab-pane fade active show" id="firstLineTitleTab" role="tabpanel">
                          <button id="allDelete" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                          <table class="table" id="mailBox">
                              
                          </table>
                        </div>
                        <div class="tab-pane fade" id="secondLineTitleTab" role="tabpanel">
                          <table class="table" id="mailBoxSend">
                              
                          </table>
                        </div>
                        <div class="tab-pane fade show" id="thirdLineTitleTab" role="tabpanel">
                          <table class="table" id="mailBoxTrsh">
                              
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

                </div>
          </div>
          <div id="emailDetaisl" class="col-sm-9 col-xxl-3 mt-4 h-75 border-info ">
                  <div class="card mb-5">
                    <div class="col-12 mt-5 float-end">
                      <div class="row g-0 justify-content-end">
                        <div class="col-auto pe-3">
                          <button class="btn btn-sm btn-danger" id="backList"><i class="fa-solid fa-xmark" width="15" height="15"></i></button>
                        </div>
                        
                      </div>
                    </div>
                    <div id="emailInfo">
                      <div class="card-body">
                        <div class="card-footer border-0 pt-0">
                            <div class="row align-items-center">
                              <div class="col-6">
                                <div class="d-flex align-items-center">
                                  <div class="sw-5 d-inline-block position-relative me-3">
                                    <img src="{{asset(Auth::user()->image)}}" class="img-fluid rounded-xl" alt="thumb">
                                  </div>
                                  <div class="d-inline-block">
                                    <a href="#" class="lh-1 mb-1 d-inline-block">admin name</a>
                                    <div class="text-muted text-small">This is admin email</div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        <h4 class="mb-3">Subject</h4>
                        <div>
                          <p>This is description</p>
                        </div>
                      </div>
                      <div id="replayFrom">
                        <form name="replayProviderForm" id="replayProviderForm">
                            <input type="hidden" name="admin_id" id="admin_id" value="`+data.admin_id+`">
                            <input type="hidden" name="subject" id="subject" value="`+data.subject+`">
                            <div class="col-12">
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="write..."></textarea>
                            </div>
                            &nbsp;
                            <div class="col-4">
                                <button class="btn btn-primary btn-sm" id="replayadminBtn" type="button">Send</button>
                                <label for="fileUpload" class="btn btn-sm btn-warning text-start"><i class="fa-solid fa-paperclip"></i></label>
                                </div>
                        </form>
                        </div>
                    </div>
                    <div id="emailSendInfo">
                      <div class="card-body">
                        <div class="card-footer border-0 pt-0">
                            <div class="row align-items-center">
                              <div class="col-6">
                                <div class="d-flex align-items-center">
                                  <div class="sw-5 d-inline-block position-relative me-3">
                                    <img src="`+data.provider.photo+`" class="img-fluid rounded-xl" alt="thumb">
                                  </div>
                                  <div class="d-inline-block">
                                    <a href="#" class="lh-1 mb-1 d-inline-block">`+data.provider.name+`</a>
                                    <div class="text-muted text-small">`+data.provider.email+`</div>
                                  </div>
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        <h4 class="mb-3">`+data.subject+`</h4>
                        <div>
                          <p>`+data.description+`</p>
                        </div>
                      </div>

                      
                    </div>
                  
                  </div>
              </div>
          </div>
      </div>
  </div>
     </div>
    
@endsection
@section('js_page')
    <script>

$(function(){

$("#composedTo").css("display", "none");
$("#emailTable").css("display", "block");
$("#emailDetaisl").css("display","none");
$("#allDelete").css("display", "none");

$("#compose").on('click',function(){
$("#composedTo").css("display", "block");
$("#emailTable").css("display", "none");
$("#composedTo").css("display", "block");
$("#emailDetaisl").css("display", "none");
});

$("#composeBack").on('click',function(){
$("#composedTo").css("display", "none");
$("#emailTable").css("display", "block");
});

$("#replayFrom").css("display", "none");
$("#replay").on('click',function(){
$("#replayFrom").css("display", "block");

});

$("#detailsShow").on('click',function(){
$("#emailDetaisl").css("display", "block");
$("#emailTable").css("display", "none");
$("#replayFrom").hide();
});

$("#backList").on('click',function(){
$("#emailDetaisl").css("display", "none");
$("#emailTable").css("display", "block");

});


$('#composedTo').css("display","none");
$("#emailTable").css("display", "block");

$("#emailDetaisl").css("display", "block"); 
$("#emailTable").css("display", "none"); 

$('#composedTo').css("display","none");
$('#emailDetaisl').css("display","none");
$("#emailTable").css("display", "block");
$("#emailDetaisl").css("display", "block"); 
$("#emailTable").css("display", "none");





});



    </script>
@endsection
