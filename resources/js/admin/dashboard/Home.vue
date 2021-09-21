<template>
  <div class="p-5 md:p-8">
    <div class="grid gap-10 md:grid-cols-4">
      <div
        data-aos="fade-down"
        data-aos-duration="800"
        class="
          bg-gradient-to-br
          from-blue-600
          to-blue-400
          h-32
          rounded-lg
          shadow-md
          transition
          duration-500
          ease-in-out
          transform
          hover:-translate-y-3
          hover:shadow-xl
        "
      >
        <a
          href="/activeUsers"
          style="text-decoration: none"
          class="cursor-pointer"
        >
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
        </a>
      </div>

      <div
        data-aos="fade-down"
        data-aos-duration="800"
        data-aos-delay="200"
        class="
          bg-gradient-to-br
          from-green-600
          to-green-500
          h-32
          rounded-lg
          shadow-md
          transition
          duration-500
          ease-in-out
          transform
          hover:-translate-y-3
          hover:shadow-xl
          cursor-pointer
        "
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
        data-aos="fade-down"
        data-aos-duration="800"
        data-aos-delay="400"
        class="
          bg-gradient-to-br
          from-yellow-500
          to-yellow-400
          h-32
          rounded-lg
          shadow-md
          transition
          duration-500
          ease-in-out
          transform
          hover:-translate-y-3
          hover:shadow-xl
          cursor-pointer
        "
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

      <div
        data-aos="fade-down"
        data-aos-duration="800"
        data-aos-delay="600"
        class="
          bg-gradient-to-br
          from-red-600
          to-red-400
          h-32
          rounded-lg
          shadow-md
          transition
          duration-500
          ease-in-out
          transform
          hover:-translate-y-3
          hover:shadow-xl
          cursor-pointer
        "
      >
        <div class="flex justify-between p-5">
          <div class="text-white">
            <h5 class="font-light text-xl md:text-base lg:text-xl">
              Suspended
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

    <div class="w-1/2 h-auto rounded shadow mt-10">
      <v-card>
        <v-card-text>
          <LineChart :height="200"></LineChart>
        </v-card-text>
      </v-card>
    </div>
  </div>
</template>

<script>
import LineChart from "../charts/LineChart.vue";
export default {
  components: { LineChart },
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
