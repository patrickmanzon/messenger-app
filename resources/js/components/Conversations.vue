<template>
    <div class="mesgs">
        <ul class="msg_history">
            <li class="receiver" v-for="message in messages" :key="message.id" :class="[message.sender == user.id ? 'sender' : 'receiver']">
                <div>
                    <p>{{ message.message }}</p>
                    <span class="time_date"> {{message.created_at}}</span>
                </div>
            </li>
        </ul>
        <Newmessage @send="newMessage"/>     
    </div>

</template>

<script>
    import Newmessage from './Newmessage'
    export default{
        components:{Newmessage},
        props: {
            messages: {
                required: true
            },
            user: {
                type: Object,
                required: true
            }
        },
        methods: {
            newMessage(message){
                this.$emit('send', message)
            }
        }
    }
</script>

<style>
    .msg_history{
        padding: 0
    }

    li{
        margin: 5px 0!important;
    }

    .receiver{
        list-style: none;
        width: 100%;
        margin: 0;
        display: flex;
        justify-content: flex-start;
    }

    .sender{
        list-style: none;
        margin: 0;
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }

    .sender .time_date{
        color: #fff;
    }

    .receiver div, .sender div{
        max-width: 50%;
    }

    .sender div{
        background: #05728f none repeat scroll 0 0 !important;
        border-radius: 3px !important;
        font-size: 14px !important;
        color: #fff !important;
        padding: 5px 10px 5px 12px !important;
        /*float: right;*/
    }

    .receiver div{
        color: #646464;
        font-size: 14px;
        padding: 5px 10px 5px 12px;
        background: #e6e1e1;
        /*float: left;*/
    }
</style>