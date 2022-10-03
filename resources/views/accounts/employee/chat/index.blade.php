@extends('accounts.employee.layouts.app-vue')
@section('title', 'Chat')
@section('content')
<div class="container">
    <!-- Chat Main Row -->
    <div class='mt-5'></div>
<div class="chat-main-row mt-5">
    <!-- Chat Main Wrapper -->
    <div class="chat-main-wrapper">
        <!-- Chats View -->
        <div class="col-lg-9 message-view task-view">
            <div class="chat-window">
                <div class="fixed-header">
                    <div class="navbar">
                        <div class="user-details mr-auto">
                            <div class="float-left user-img">
                                    <a href="profile.html" class="avatar">
                                        <img
                                        src="/storage/employee_images/{{ Auth::user()->employee->information->photo }}" alt="">
                                    <span class="status online"></span>
                                    </a>
                            </div>
                            <div class="user-info float-left">
                                <a href="profile.html" title="employee_name"><span>{{ $account->employee->fullname }}</span> <i
                                        class="typing-text"> Active</i></a>
                                <span class="last-seen">Last seen today at 7:50 AM</span>
                            </div>
                        </div>
                        <div class="search-box">
                            <div class="input-group input-group-sm">
                                <input type="text" placeholder="Search" class="form-control">
                                <span class="input-group-append">
                                    <button type="button" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                        <ul class="nav custom-menu">
                            <li class="nav-item">
                                <a class="nav-link task-chat profile-rightbar float-right" id="task_chat"
                                    href="#task_window"><i class="fa fa-user"></i></a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="voice-call.html" class="nav-link"><i class="fa fa-phone"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="video-call.html" class="nav-link"><i class="fa fa-video-camera"></i></a>
                            </li> --}}
                            <li class="nav-item dropdown dropdown-action">
                                <a aria-expanded="false" data-toggle="dropdown" class="nav-link dropdown-toggle"
                                    href=""><i class="fa fa-cog"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="javascript:void(0)" class="dropdown-item">Delete Conversations</a>
                                    <a href="javascript:void(0)" class="dropdown-item">Settings</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="chat-contents" id="chatContent">
                    <div class="chat-content-wrap" id="chatContents">
                        <div class="chat-wrap-inner">
                            <div class="chat-box">
                                <div class="chats" id="chat__content__parent">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-footer">
                    <div class="message-bar">
                        <div class="message-inner">
                            <a class="link attach-icon" href="#" data-toggle="modal" data-target="#drag_files"><img
                                    src="assets/img/attachment.png" alt=""></a>
                            <div class="message-area">
                                <div class="input-group">
                                    <textarea class="form-control" id="textArea" placeholder="Type message..."></textarea>
                                    <span class="input-group-append">
                                        <button class="btn btn-custom" type="button" id="btnSubmit"><i class="fa fa-send"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Chats View -->


        <!-- Chat Right Sidebar -->
        <div class="col-lg-3 message-view chat-profile-view chat-sidebar" id="task_window">
            <div class="chat-window video-window">
                <div class="fixed-header">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link" href="#calls_tab" data-toggle="tab">Active Users</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#profile_tab"
                                data-toggle="tab">Profile</a></li>
                    </ul>
                </div>
                <div class="tab-content chat-contents">
                    <div class="content-full tab-pane" id="calls_tab">
                        <div class="chat-wrap-inner">
                            <div class="chats">
                                <div class="chat chat-left" id="active__user__{{ Auth::user()->employee_id }}" data-attribute="active_user">
                                    <div class="chat-box">
                                        <div class="user-img">
                                            <a href="javascript:;" class="avatar">
                                                <img src="/storage/employee_images/{{ Auth::user()->employee->information->photo }}" alt="">
                                            <span class="status online"></span>
                                            </a>
                                            <a href="javascript:;" class="h6">{{  Auth::user()->employee->fullname }}</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="chat chat-left" id="active__user__0460" data-sender="{{ Auth::user()->employee_id }}" data-receiver="0460">
                                    <div class="chat-box" data-sender="{{ Auth::user()->employee_id }}" data-receiver="0460">
                                        <div class="user-img" data-sender="{{ Auth::user()->employee_id }}" data-receiver="0460">
                                            <a class="avatar" data-sender="{{ Auth::user()->employee_id }}" data-receiver="0460">
                                                {{-- <img data-sender="{{ Auth::user()->employee_id }}" src="/storage/employee_images/{{ Auth::user()->employee->information->photo }}" data-receiver="0460"> --}}
                                                <img data-sender="{{ Auth::user()->employee_id }}" src="/storage/employee_images/0460_Arreza.jpg" data-receiver="0460">
                                            <span class="status online" data-sender="{{ Auth::user()->employee_id }}" data-receiver="0460"></span>
                                            </a>
                                            <a href="#" class="h6" data-sender="{{ Auth::user()->employee_id }}" data-receiver="0460">MILLAGROS LAVILLA ARREZA</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="content-full tab-pane show active" id="profile_tab">
                        <div class="display-table">
                            <div class="table-row">
                                <div class="table-body">
                                    <div class="table-content">
                                        <div class="chat-profile-img">
                                            <div class="edit-profile-img">
                                                <img src="/storage/employee_images/{{ is_null($account->employee->information) ? 'no_image.png' : $account->employee->information->photo }}" alt="Profile picture">
                                                <span class="change-img">Change Image</span>
                                            </div>
                                            <h3 class="user-name m-t-10 mb-0 text-sm">{{ $account->employee->fullname }}</h3>
                                            <small class="text-muted">{{ $account->employee->information->position->position_name }}</small>
                                            <a href="javascript:void(0);" class="btn btn-primary edit-btn"><i
                                                    class="fa fa-pencil"></i></a>
                                        </div>
                                        <div class="chat-profile-info">
                                            <ul class="user-det-list">
                                                <li>
                                                    <span>Username:</span>
                                                    <span class="float-right text-muted">{{ $account->username }}</span>
                                                </li>
                                                <li>
                                                    <span>DOB:</span>
                                                    <span class="float-right text-muted">{{  $account->employee->date_birth }}</span>
                                                </li>
                                                <li>
                                                    <span>Email:</span>
                                                    <span class="float-right text-muted">{{ $account->email ?? 'N/A' }}</span>
                                                </li>
                                                <li>
                                                    <span>Phone:</span>
                                                    <span class="float-right text-muted">{{ $account->mobile_no ?? 'N/A' }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="transfer-files">
                                            <ul class="nav nav-tabs nav-tabs-solid nav-justified mb-0">
                                                <li class="nav-item"><a class="nav-link active" href="#all_files"
                                                        data-toggle="tab">All Files</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#my_files"
                                                        data-toggle="tab">My Files</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="all_files">
                                                    <ul class="files-list">
                                                        <li>
                                                            <div class="files-cont">
                                                                <div class="file-type">
                                                                    <span class="files-icon"><i
                                                                            class="fa fa-file-pdf-o"></i></span>
                                                                </div>
                                                                <div class="files-info">
                                                                    <span class="file-name text-ellipsis">AHA Selfcare
                                                                        Mobile Application Test-Cases.xls</span>
                                                                    <span class="file-author"><a href="#">Loren
                                                                            Gatlin</a></span> <span
                                                                        class="file-date">May 31st at 6:53 PM</span>
                                                                </div>
                                                                <ul class="files-action">
                                                                    <li class="dropdown dropdown-action">
                                                                        <a href="" class="dropdown-toggle"
                                                                            data-toggle="dropdown"
                                                                            aria-expanded="false"><i
                                                                                class="material-icons">more_horiz</i></a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)">Download</a>
                                                                            <a class="dropdown-item" href="#"
                                                                                data-toggle="modal"
                                                                                data-target="#share_files">Share</a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane" id="my_files">
                                                    <ul class="files-list">
                                                        <li>
                                                            <div class="files-cont">
                                                                <div class="file-type">
                                                                    <span class="files-icon"><i
                                                                            class="fa fa-file-pdf-o"></i></span>
                                                                </div>
                                                                <div class="files-info">
                                                                    <span class="file-name text-ellipsis">AHA Selfcare
                                                                        Mobile Application Test-Cases.xls</span>
                                                                    <span class="file-author"><a href="#">John
                                                                            Doe</a></span> <span class="file-date">May
                                                                        31st at 6:53 PM</span>
                                                                </div>
                                                                <ul class="files-action">
                                                                    <li class="dropdown dropdown-action">
                                                                        <a href="" class="dropdown-toggle"
                                                                            data-toggle="dropdown"
                                                                            aria-expanded="false"><i
                                                                                class="material-icons">more_horiz</i></a>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item"
                                                                                href="javascript:void(0)">Download</a>
                                                                            <a class="dropdown-item" href="#"
                                                                                data-toggle="modal"
                                                                                data-target="#share_files">Share</a>
                                                                        </div>
                                                                    </li>
                                                                </ul>
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
            </div>
        </div>
        <!-- /Chat Right Sidebar -->
    </div>
    <!-- /Chat Main Wrapper -->
</div>
<!-- /Chat Main Row -->
</div>

@push('page-scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/qs/6.10.1/qs.min.js"></script> --}}
{{-- <script src="https://cdn.socket.io/3.1.1/socket.io.min.js" integrity="sha384-gDaozqUvc4HTgo8iZjwth73C6dDDeOJsAgpxBcMpZYztUfjHXpzrpdrHRdVp8ySO" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.min.js" integrity="sha512-fB746S+jyTdN2LSWbYSGP2amFYId226wpOeV4ApumcDpIttPxvk1ZPOgnwqwQziRAtZkiFJVx9F64GLAtoIlCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

<script>


     // get show type indicator msg //
    // (function () {

    //     document.querySelector('#indicator').style.display = 'none';

    // })();


    let messageChat = document.querySelector('#textArea');
    const btnSubmit = document.querySelector('#btnSubmit');
    // const chatBox = document.querySelector('.chat-box');
    // const userName = '{{ $account->username }}';
    // const officeName = '{{ $account->office }}'
    const time = new Date();

    let receiver = 0, sender = ID;

    let roomReverse = false;

    let chatContent = document.querySelector('#chatContent');




    // join chat room //
    // const socket = io.connect("{{ env('MIX_SOCKET_IP') }}");
    // socket.emit('joinRoom', { userName, officeName, messageChat });




     // get username and office from URL //
    //  const { username, office, messageInput } = Qs.parse(location.search, {
    //   ignoreQueryPrefix: true
    // });



    socket.on('message_sent', function (message) {
    });


    // messageChat.addEventListener('keyup', (e) => {
    //     e.preventDefault();
    // });



    btnSubmit.addEventListener('click', (e) => {
        e.preventDefault();
        const msgInput = messageChat.value;
        if(msgInput) {
            socket.emit('send_message', {
                sender,
                receiver,
                roomReverse,
                message : msgInput,
            });

            messageChat.value = '';
            messageChat.focus();

            chatContent.scrollTop = chatContent.scrollHeight;
        }

    });




    // function outputMessage(data) {
    //     let div = document.createElement('div');
    //     div.classList.add('message');
    //     div.innerHTML = `<div class="chat chat-left">
    //                             <div class="chat-avatar">
    //                                 <a href="profile.html" class="avatar">
    //                                     <img alt="" src="assets/img/profiles/avatar-05.jpg">
    //                                 </a>
    //                             </div>
    //                             <div class="chat-body" id="chatBody">
    //                                 <div class="chat-bubble">
    //                                     <div class="chat-content">
    //                                         <p>${data.message}</p>
    //                                         <span class="chat-time">8:30 am</span>

    //                                         <p class="meta">${data.username}</p>


    //                                     </div>
    //                                     <div class="chat-action-btns">
    //                                         <ul>
    //                                             <li><a href="#" class="share-msg" title="Share"><i
    //                                                         class="fa fa-share-alt"></i></a></li>
    //                                             <li><a href="#" class="edit-msg"><i
    //                                                         class="fa fa-pencil"></i></a></li>
    //                                             <li><a href="#" class="del-msg"><i class="fa fa-trash-o"></i></a></li>
    //                                         </ul>
    //                                     </div>
    //                                 </div>
    //                             </div>
    //                         </div>`;
    //     document.querySelector('#chatLeft').appendChild(div);
    // }


    $(document).on('click', function (event) {
        if(event.target.getAttribute('data-receiver')) {
            receiver = String(event.target.getAttribute('data-receiver'));
            sender = String(event.target.getAttribute('data-sender'));
            let data = { sender, receiver };

            socket.emit(`request_conversation`, data);
        }
    });



    socket.on(`invite_${ID}`, function (data) {
        if(data.sender != ID) {
            roomReverse = true;
        }
        receiver = data.sender;
        socket.emit('join', data);
    });



    socket.on(`send_to_receiver`, function (data) {
        let chatPositionClass = "right";

        if(data.sender !== ID) {
            chatPositionClass = "left";
        }

        $('#chat__content__parent').append(`
            <div class="chat chat-${chatPositionClass}">
                <div class="chat-body">
                    <div class="chat-bubble">
                        <div class="chat-content">
                            <p>${data.message}</p>
                            <span class="chat-time">{{ date('h:i A', time()) }}</span>
                        </div>
                        <div class="chat-action-btns">
                            <ul>
                                <li><a href="#" class="share-msg" title="Share"><i
                                            class="fa fa-share-alt"></i></a></li>
                                <li><a href="#" class="edit-msg"><i
                                            class="fa fa-pencil"></i></a></li>
                                <li><a href="#" class="del-msg"><i
                                            class="fa fa-trash-o"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        `);

    });

</script>

@endpush
@endsection
