<!-- <template>
            
                <a :href="threadUrl" class="dropdown-item">
                    {{ ucfirst(unread.data.user.first_name)}} applying on your job post {{ unread.data.post.title}}
                </a>
            
</template>

<script>
    export default {
        props:['unread'],
        data(){
            return {
                threadUrl:""
            }
        },
        mounted(){
            this.threadUrl="http://localhost:8000/posts/"+ this.unread.data.post.slug
        }
    }
</script>
 -->