
  <div v-if="$loadingRouteData">
    <div class="white-widget grey-bg author-area">
    <div class="auth-info row">
    <div class="timeline-wrapper">
    <div class="timeline-item">
        <div class="animated-background">
            <div class="background-masker header-top"></div>
            <div class="background-masker header-left"></div>
            <div class="background-masker header-right"></div>
            <div class="background-masker header-bottom"></div>
            <div class="background-masker subheader-left"></div>
            <div class="background-masker subheader-right"></div>
            <div class="background-masker subheader-bottom"></div>
        </div>
    </div>
    </div>
    </div>
    </div>
  </div>

    <h2 v-text="user.name"></h2>
    <p v-text="user.description"></p>
  </div>

<script>
    /*let app = new Vue{
      el:'#app',
        data(){
            return{
                user: {}
            }
        },
        route: {
            data: function (transition) {
                this.getUserDetails(transition);
            }
        },

        methods: {

            getUserDetails(transition)
            {
                this.$http.get('/users/' + this.$route.params.userName)
                    .then(function (response) {
                        this.user = response.data;
                        transition.next();
                    });

            }
        }
    }*/
</script>