<template>
    <div class="w-full h-auto shadow-md rounded-lg flex space-x-2">
        <div class="w-full lg:w-4/6 px-5 rounded-lg">
            <v-text-field v-model="email" placeholder="Enter you username">
            </v-text-field>

            <v-text-field
                v-model="password"
                type="password"
                placeholder="Enter you username"
            >
            </v-text-field>

            <v-btn @click="handleLogin">
                Login
            </v-btn>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: ""
        };
    },
    mounted() {
        console.log("login mounted successfully");
    },
    methods: {
       handleLogin(){
          const self = this;
          let data = {
             email:self.email,
             password:self.password
          };

         let response = self.login(data);
          console.log(response);
          console.log("okey i m handling login");
       }
    },
};
</script>
