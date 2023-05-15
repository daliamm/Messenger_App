<template>
<div class="container py-8">
                                    <!-- Title -->
                                    <div class="mb-8">
                                        <h2 class="fw-bold m-0">Chats</h2>
                                    </div>

                                    <!-- Search -->
                                    <div class="mb-6">
                                        <form action="#">
                                            <div class="input-group">
                                                <div class="input-group-text">
                                                    <div class="icon icon-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
                                            </div>
                                        </form>
                                    </div>

                                    <!-- Chats -->
                                    <div class="card-list" id="chat-list">
                                        <!-- @foreach ($chats as $chat)
                                        <a href="{{route('messenger',$chat->id)}}" class="card border-0 text-reset">
                                            <div class="card-body">
                                                <div class="row gx-5">
                                                    <div class="col-auto">
                                                        <div class="avatar-group-trigon avatar-group-trigon-sm">
                                                            <div class="avatar avatar-sm">
                                                                <img class="avatar-img" src="assets/img/avatars/7.jpg" alt="#">
                                                            </div>

                                                            <div class="avatar avatar-sm">
                                                                <img class="avatar-img" src="assets/img/avatars/9.jpg" alt="#">
                                                            </div>

                                                            <div class="avatar avatar-sm">
                                                                <span class="avatar-text bg-primary">{{strtoupper(substr($chat->participants[0]->name,0,1))}}</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <h5 class="me-auto mb-0">{{$chat->participents[0]->name}}</h5>
                                                            <span class="text-muted extra-small ms-2">{{$chat->lastMessage->created_at->diffForHumans()}}</span>
                                                        </div>

                                                        <div class="d-flex align-items-center">
                                                            <div class="line-clamp me-auto">
                                                             {{str::words($chat->lastMessage->body,20) }}
                                             
                                        </a>-->
                                                    </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <!-- Card -->
                                        <a href="chat-direct.html" class="card border-0 text-reset">
                                            <div class="card-body">
                                                <div class="row gx-5">
                                                    <div class="col-auto">
                                                        <div class="avatar">
                                                            <img src="assets/img/avatars/4.jpg" alt="#" class="avatar-img">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <h5 class="me-auto mb-0">Warren White</h5>
                                                            <span class="text-muted extra-small ms-2">06:20 PM</span>
                                                        </div>

                                                        <div class="d-flex align-items-center">
                                                            <div class="line-clamp me-auto">
                                                                Hello! Yeah, I'm going to meet my friend of mine at the departments stores as soon as possible.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .card-body -->
                                        </a>
                                        <!-- Card -->

                                        @endforeach
                                    </div>
                                    <!-- Chats -->
</template>
<script>
export default{

}
</script>