<template>
  <div class="p-5 md:p-8">
    <dashboard-divs></dashboard-divs>
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
import DashboardDivs from "../../components/DashboardDiv.vue";
export default {
  components: { LineChart, DashboardDivs },
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
