<template>
    <div>
        <v-banner elevation="24" icon="mdi-home"> {{ appurl }} 

            <v-alert v-if="username">
                You are logged in as {{username.name}}
            </v-alert>

            <v-alert v-else>
                please login
            </v-alert>
           
            </v-banner>
    </div>
</template>

<script>
export default {
    data() {
        return {
            appurl: APP.APP_URL,
            username: APP.USER
        };
    },
    mounted(){
        this.getApi();
    },
    methods: {
       getApi(){
           const self = this;
           self.url = "/api/check";
           let res = self.getAll();
          console.log(res);
        
       }
    }
};
</script>
