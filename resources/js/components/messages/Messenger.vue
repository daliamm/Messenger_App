<template>
    <!-- Chat -->
    <main class="main is-visible" data-dropzone-area="">
                <div class="container h-100">

                    <div class="d-flex flex-column h-100 position-relative">
                        <!-- Chat: Header -->
                        <ChatHeader/>
                        <!-- Chat: Header -->

                        <!-- Chat: Content -->
                       <ChatContent/>
                        <!-- Chat: Content -->

                        <!-- Chat: Footer -->
                        <ChatFooter/>
                        <!-- Chat: Footer -->
                    </div>

                </div>
            </main>
            <!-- Chat -->
</template>
<script>
import ChatHeader from './ChatHeader.vue';
import ChatContent from './ChatContent.vue';
import ChatFooter from './ChatFooter.vue';
export default{
    components :{
        ChatHeader
        ,ChatFooter
        ,ChatContent
    }
}
</script>