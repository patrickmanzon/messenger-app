<template>
    <div class="type_msg">
        <div class="input_msg_write">
          <input type="text" class="write_msg" placeholder="Type a message" v-model="message" @keydown.enter.prevent = "sendMessage"/>
          <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                message: ''
            }
        },
        methods: {
            sendMessage(){
                if(this.message){
                    this.$emit('send', this.message)
                    this.message = ''
                }
            }
        }
    }
</script>