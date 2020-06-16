<!-- <template>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" @click="markNotificationAsRead" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="counter"> 
                                    
                                    {{unreadNotifications.length}}
                                </span>

                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                
                                <h6 style="text-align: center;">Notifications</h6>                               
                                <hr>
                                
                                <notification-item v-for="unread in unreadNotifications" :unread="unread" :key="unread.id"></notification-item>

                            </div>
                        </li>
</template>

<script>
    import NotificationItem from './NotificationItem.vue';
    export default {
        props:['unreads', 'userid'],
        components:{NotificationItem},
        data(){
            return {
                unreadNotifications: this.unreads
            }
        },

         methods: {
            markNotificationAsRead() {
                if (this.unreadNotifications.length) {
                    axios.get('/markAsRead');
                }
            }
        },
        mounted() {
            console.log('Component mounted.')

            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification);
                    let newUnreadNotifications={data:{post:notification.post, user:notification.user}};
                    this.unreadNotifications.push(newUnreadNotifications);
                });
        }
    }
</script>
 -->