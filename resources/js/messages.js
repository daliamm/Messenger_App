import  {createApp} from "@vue/runtime-dom  ";
import Messenger from "./components/messages/Messenger.vue"
import Messenger from "./components/messages/ChatList.vue"
const cahtApp=Vue.createApp({});
cahtApp.component('Messenger',Messenger);
cahtApp.component('ChatList',ChatList);
cahtApp.mount('#chat-app');
// Vue.createApp(counter).mount('#counter')