<template>
    <div class="messaging">
        <div class="inbox_msg" v-if="contacts">
            <Inbox :contacts = "contacts" @select="currentSelectedContact"/>
            <h3 class="text-center">{{ currentContact != null ? currentContact.name : "Select a Chatmate"  }}</h3> 
            <Conversations :messages = "messages" :user="user" @send="newMessage"/>
        </div>
    </div>
</template>

<script>
    import Inbox from './Inbox'
    import Conversations from './Conversations'

    export default {
        components: {Inbox, Conversations},
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data() {
            return {
                contacts: null,
                messages: null,
                currentContact: null
            }
        },
        methods: {
            currentSelectedContact(contact)
            {   
                this.currentContact = contact
                axios.get(`/messages/${contact.id}`)
                    .then(res => {
                        this.messages = res.data
                    })
            },
            newMessage(message){
                axios.post('/messages', { receiver: this.currentContact.id, message: message })
                    .then(res => {
                        this.messages.push(res.data)
                    })
            }
        },
        created() {
            axios.get('/messages/contacts')
                .then(res => {
                    //console.log(res.data)
                    this.contacts = res.data
                })
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    h3{
        /*margin: 10px 0;*/
        border-bottom: 1px solid #c4c4c4;
        padding: 10px 0;
    }
</style>