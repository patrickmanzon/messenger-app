<template>
    <div class="inbox_people">
        <div class="headind_srch">
            <div class="recent_heading">
                <h4>Recent</h4>
            </div>
            <div class="srch_bar">
                <div class="stylish-input-group">
                    <input type="text" class="search-bar"  placeholder="Search" >
                    <span class="input-group-addon">
                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                    </span> 
                </div>
             </div>
        </div>
        <div class="inbox_chat">
            <div v-for="(contact, index) in contacts" :key="contact.id" :class="['chat_list',  isActive(contact)]" @click="selectContact(contact)">
                <div class="chat_people">
                    <div class="chat_img"> 
                        <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                    </div>
                    <div class="chat_ib">
                        <h5>{{ contact.name }} <span class="chat_date">Dec 25</span></h5>
                            <p>{{ contact.email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props:{
            contacts: {
                type: Array,
                required: true
            }
        },
        data(){
            return {
                selected: null
            }
        },
        methods: {
            selectContact(contact){
                this.selected = contact
                this.$emit("select", contact)
            },
            isActive(contact){
                if(this.selected == null) return ''
                return contact.id === this.selected.id ? 'active_chat' : '' 
            }
        },
        created(){
            console.log(this.contacts)
        }
    }
</script>

<style>
    .chat_list{
        cursor: pointer;
    }
</style>