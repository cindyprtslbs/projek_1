
@extends('myview.header')

@section('content')
<div class="container">
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                <div class="email-wrapper wrapper">
                    <div class="row align-items-stretch">
                    <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white">
                        <div class="menu-bar">
                        <ul>
                            <button class="btn btn-primary btn-block">Compose</button>
                            <li class="nav-item"><i class="ti-email"></i> Inbox</li>

                        </ul>
                        <div class="wrapper">
                            <div class="online-status d-flex justify-content-between align-items-center">
                            <p class="chat">Chats</p> <span class="status offline online"></span>
                            </div>
                        </div>
                        <ul >
                            <li class="nav-item"> <a href="#"> <span class="pro-pic"><img src="{{ asset('assets/images/faces/face1.jpg') }}" alt=""></span>
                                <div class="user">
                                </div>
                            </a></li>
                            {{-- <li class="nav-item"> <a href="#"> <span class="pro-pic"><img src="{{ asset('assets/images/faces/face2.jpg')}}" alt=""></span>
                                <div class="user">
                                </div>
                            </a></li>
                            <li class="nav-item"> <a href="#"> <span class="pro-pic"><img src="{{ asset('assets/images/faces/face20.jpg')}}" alt=""></span>
                                <div class="user">
                                </div>
                            </a></li> --}}
                        </ul>
                        </div>
                    </div>
                    <div class="mail-list-container col-md-3 pt-4 pb-4 border-right bg-white">
                        <div class="border-bottom pb-4 mb-3 px-3">
                        <div class="form-group">
                            <input class="form-control w-100" type="search" placeholder="Search mail" id="Mail-rearch">
                        </div>
                        </div>
                        <div class="mail-list">
                        <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input"> <i class="input-helper"></i></label></div>
                        <div class="content">
                            <p class="sender-name">David Moore</p>
                            <p class="message_text">Hi Emily, Please be informed that the new project presentation is due
                            Monday.</p>
                        </div>
                        <div class="details">
                            <i class="ti-star"></i>
                        </div>
                        </div>
                        <div class="mail-list new_mail">
                        <div class="form-check"> <label class="form-check-label"> <input type="checkbox" class="form-check-input" checked=""> <i class="input-helper"></i></label></div>
                        <div class="content">
                            <p class="sender-name">Microsoft Account Password Change</p>
                            <p class="message_text">Change the password for your Microsoft Account using the security code 35525
                            </p>
                        </div>
                        <div class="details">
                            <i class="ti-star favorite"></i>
                        </div>
                        </div>
                    </div>
                    <div class="mail-view d-none d-md-block col-md-9 col-lg-7 bg-white">
                        <div class="row">
                        <div class="col-md-12 mb-4 mt-4">
                            <div class="btn-toolbar">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="ti-trash text-primary me-1"></i>Delete</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="message-body">
                        <div class="sender-details">
                            <img class="img-sm rounded-circle me-3" src="../../../assets/images/faces/face11.jpg" alt="">
                            <div class="details">
                            <p class="msg-subject">
                                Weekly Update - Week 19 (May 8, 2017 - May 14, 2017)
                            </p>
                            <p class="sender-email">
                                Sarah Graves
                                <a href="#">itsmesarah268@gmail.com</a>
                                &nbsp;<i class="ti-user"></i>
                            </p>
                            </div>
                        </div>
                        <div class="message-content">
                            <p>Hi Emily,</p>
                            <p>This week has been a great week and the team is right on schedule with the set deadline. The team
                            has made great progress and achievements this week. At the current rate we will be able to deliver
                            the product right on time and meet the quality that is expected of us. Attached are the seminar
                            report held this week by our team and the final product design that needs your approval at the
                            earliest.</p>
                            <p>For the coming week the highest priority is given to the development for <a href="http://www.bootstrapdash.com/" target="_blank">http://www.bootstrapdash.com/</a> once the
                            design is approved and necessary improvements are made.</p>
                            <p><br><br>Regards,<br>Sarah Graves</p>
                        </div>
                        <div class="attachments-sections">
                            <ul>
                            <li>
                                <div class="thumb"><i class="ti-file"></i></div>
                                <div class="details">
                                <p class="file-name">Seminar Reports.pdf</p>
                                <div class="buttons">
                                    <p class="file-size">678Kb</p>
                                    <a href="#" class="view">View</a>
                                    <a href="#" class="download">Download</a>
                                </div>
                                </div>
                            </li>
                            <li>
                                <div class="thumb"><i class="ti-image"></i></div>
                                <div class="details">
                                <p class="file-name">Product Design.jpg</p>
                                <div class="buttons">
                                    <p class="file-size">1.96Mb</p>
                                    <a href="#" class="view">View</a>
                                    <a href="#" class="download">Download</a>
                                </div>
                                </div>
                            </li>
                            </ul>
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
