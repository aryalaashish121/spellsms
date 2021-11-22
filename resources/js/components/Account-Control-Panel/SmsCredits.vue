<template>
  <div class="col-span-1 shadow rounded h-72 border">
    <div class="flex flex-col p-3">
      <div class="flex justify-between">
        <h1 class="text-sm font-semibold">SMS Credits</h1>
        <v-speed-dial
          v-model="fabThree"
          transition="slide-x-transition"
          direction="bottom"
        >
          <template v-slot:activator>
            <v-btn
              v-model="fabThree"
              x-small
              class="mr-3 -mt-1"
              color="green"
              dark
              fab
            >
              <v-icon v-if="fabThree"> mdi-close </v-icon>
              <v-icon v-else> mdi-cog </v-icon>
            </v-btn>
          </template>
          <div class="-ml-1.5">
            <tool-tip
              v-for="(item, index) in creditTooltips"
              :key="index"
              :title="item.title"
              :icon="item.icon"
              :color="item.color"
              :href="item.href"
              :data="userdetails"
            >
            </tool-tip>
          </div>
        </v-speed-dial>
      </div>
      <div class="flex justify-center">
        <DonutChart :height="220"></DonutChart>
      </div>
    </div>
  </div>
</template>
<script>
import DonutChart from "../../admin/charts/CreditsDonutChart.vue";
import ToolTip from "../ToolTips.vue";
export default {
  components: { DonutChart, ToolTip },
  data() {
    return {
      fabThree: "",
      creditTooltips: [
        {
          icon: "mdi-eye",
          title: "View Report",
          color: "primary",
        },
        {
          icon: "mdi-wrench",
          title: "Manage Credits",
          color: "green",
          href: "/user/creditDebit",
        },
      ],
    };
  },
};
</script>