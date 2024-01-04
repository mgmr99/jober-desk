@extends('layouts.adminpanel')
@section('notification')
<li class="nav-item">
    <a class="nav-link"  href="{{ route('admin.notifications') }}" role="button">
        <i class="fas fa-bell">
        </i>
        @if ($notification)
            <p class="txt">{{ $notification->count()}}</p>
        @endif
    </a>
</li>
@endsection
@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap);
        body {
        font-family: "Roboto", sans-serif;
        background: #EFF1F3;
        min-height: 100vh;
        position: relative;
        }
        a {
        text-decoration: none;
        }
        .logo-title{
            font-size: 25px;
            font-weight: bold;
            color: #9e0000;
        }
        .section-50 {
        padding: 50px 0;
        }
        .m-b-50 {
        margin-bottom: 50px;
        }
        .dark-link {
        color: #333;
        text-decoration:none!important;
        }
        .heading-line {
        position: relative;
        padding-bottom: 5px;
        }
        .heading-line:after {
        content: "";
        height: 4px;
        width: 75px;
        background-color: #0355d0;
        position: absolute;
        bottom: 0;
        left: 0;
        }
        .notification-ui_dd-content {
        margin-bottom: 30px;
        }
        .notification-list {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 20px;
        margin-bottom: 7px;
        background: #fff;
        -webkit-box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }
        .notification-list--unread {
        border-left: 2px solid #0355d0;
        }
        .notification-list--read {
        border-left: 2px solid #03ae30;
        }
        .notification-list .notification-list_content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        }
        .notification-list .notification-list_content .notification-list_img img {
        height: 48px;
        width: 48px;
        border-radius: 50px;
        margin-right: 20px;
        }
        .notification-list .notification-list_content .notification-list_detail p {
        margin-bottom: 5px;
        line-height: 1.2;
        }
        .notification-list .notification-list_feature-img img {
        height: 48px;
        width: 48px;
        border-radius: 5px;
        margin-left: 20px;
        }
        .top-contents{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        button{
            height: 32px;
            width: fit-content;
            display: flex;
        }
    </style>     

    <section class="section-50">
        <div class="container">
          <div class="top-contents">
            <h3 class="m-b-50 heading-line">Notifications <i class="fa fa-bell text-muted"></i></h3>
            <button class="btn btn-primary">Mark All Read</button>
          </div>
            <div class="notification-ui_dd-content">
                @foreach($notifications as $notification)
                    @foreach (json_decode($notification->data) as $data)
                        <div class="notification-list notification-list--unread">
                            <div class="notification-list_content">
                                    <div class="notification-list_img"> <i class="nav-link fas fa-user"></i> </div>
                                    <div class="notification-list_detail">
                                    <p><b>{{ $data->name }}</b></p>
                                    <p class="text-muted"> registered to your site.</p>
                                    <p class="text-muted"><small>{{ $notification->created_at->diffForHumans() }}</small></p>
                                    </div>
                            </div>
                                <div class="notification-list_feature-img">
                                    {{ dd($notification)  }}
                                    <form action="{{ route('admin.notifications.markAsRead',$notification->id) }}" method="post">
                                        @csrf
                                        @if ($notification->read_at == null)
                                        <button type="submit" class="btn btn-secondary">Mark as read</button>
                                        @endif
                                    </form>
                                </div>
                        </div>
                    @endforeach
                 @endforeach
            </div>
                <div class="text-center"> <a href="#" class="btn btn-success">Load more activity</a> </div>
                </div>
    </section>

@endsection