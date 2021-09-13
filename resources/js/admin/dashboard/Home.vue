<template>
  <div class="p-5 md:p-8">
    <div class="grid gap-10 md:grid-cols-4">
      <div class="bg-gradient-to-br from-blue-600 to-blue-400 h-32 rounded-lg">
        <div class="flex justify-between p-5">
          <div class="text-white">
            <h5 class="font-light text-xl md:text-base lg:text-xl">
              Total Users
            </h5>
            <p class="text-4xl mt-3">11</p>
          </div>
          <div class="mt-4">
            <v-icon size="50" color="#FFFFFF" class="opacity-70">
              mdi-account-clock
            </v-icon>
          </div>
        </div>
      </div>

      <div
        class="bg-gradient-to-br from-green-600 to-green-500 h-32 rounded-lg"
      >
        <div class="flex justify-between p-5">
          <div class="text-white">
            <h5 class="font-light text-xl md:text-base lg:text-xl">
              Total Sales
            </h5>
            <p class="text-4xl mt-3">5</p>
          </div>
          <div class="mt-4">
            <v-icon size="50" color="#FFFFFF" class="opacity-70">
              mdi-cash
            </v-icon>
          </div>
        </div>
      </div>

      <div
        class="bg-gradient-to-br from-yellow-500 to-yellow-400 h-32 rounded-lg"
      >
        <div class="flex justify-between p-5">
          <div class="text-white">
            <h5 class="font-light text-xl md:text-base lg:text-xl">
              Total SMS
            </h5>
            <p class="text-4xl mt-3">5</p>
          </div>
          <div class="mt-4">
            <v-icon size="50" color="#FFFFFF" class="opacity-70">
              mdi-email-multiple-outline
            </v-icon>
          </div>
        </div>
      </div>

      <div class="bg-gradient-to-br from-red-600 to-red-400 h-32 rounded-lg">
        <div class="flex justify-between p-5">
          <div class="text-white">
            <h5 class="font-light text-xl md:text-base lg:text-xl">
              Suspended Accounts
            </h5>
            <p class="text-4xl mt-3">5</p>
          </div>
          <div class="mt-4">
            <v-icon size="50" color="#FFFFFF" class="opacity-70">
              mdi-account-remove
            </v-icon>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      appurl: APP.APP_URL,
      username: APP.USER,
    };
  },
  mounted() {
    this.getApi();
  },
  methods: {
    getApi() {
      const self = this;
      self.url = "/api/check";
      let res = self.getAll();
      console.log(res);
    },
  },
};
</script>
