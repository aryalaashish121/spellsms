<template>
  <div
    class="
      w-full
      h-5/6
      rounded-lg
      flex
      space-x-2
      container
      justify-center
      pt-20
      items-center
    "
  >
    <div class="w-3/4 h-96 shadow-lg rounded-xl mt-auto">
      <div class="grid grid-cols-2 divide-x border rounded-xl">
        <div class="col-span-1 h-96 p-10">
          <h1 class="text-lg">Login</h1>
          <div class="flex space-x-1 mt-1">
            <div class="bg-blue-400 h-1 w-10 rounded-full"></div>
            <div class="bg-blue-400 h-1 w-5 rounded-full"></div>
          </div>
          <v-text-field
            class="mt-5"
            append-icon="mdi-email"
            v-model="email"
            placeholder="Enter you username"
          >
          </v-text-field>

          <v-text-field
            v-model="password"
            type="password"
            append-icon="mdi-lock"
            placeholder="Enter password"
          >
          </v-text-field>

          <v-btn
            color="primary"
            dark
            rounded
            elevation="2"
            class="capitalize"
            @click="handleLogin"
          >
            Login
          </v-btn>
        </div>
        <div class="col-span-1 h-96 rounded-r-xl overflow-hidden">
          <lottie-player
            src="https://assets1.lottiefiles.com/packages/lf20_1z0fledt.json"
            background="transparent"
            speed="1"
            style="width: 100%; height: 100%"
            loop
            autoplay
          ></lottie-player>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  mounted() {
    console.log("login mounted successfully");
  },
  methods: {
    handleLogin() {
      const self = this;
      let data = {
        email: self.email,
        password: self.password,
      };

      let response = self.login(data);
      console.log(response);
      console.log("okey i m handling login");
    },
  },
};
</script>
