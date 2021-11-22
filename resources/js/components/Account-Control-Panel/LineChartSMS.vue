<template>
  <div class="col-span-1 shadow rounded h-72 border">
    <div class="flex flex-col p-3">
      <div class="flex justify-between">
        <h1 class="text-sm font-semibold">Check Dialogue ToolTip</h1>
        <v-speed-dial
          v-model="fabFour"
          transition="slide-x-transition"
          direction="bottom"
        >
          <template v-slot:activator>
            <v-btn
              v-model="fabFour"
              x-small
              class="mr-3 -mt-1"
              color="green"
              dark
              fab
            >
              <v-icon v-if="fabFour"> mdi-close </v-icon>
              <v-icon v-else> mdi-help </v-icon>
            </v-btn>
          </template>
          <div class="-ml-1.5">
            <dialogue-tool-tips
              v-for="(item, index) in dialogueToolTips"
              :key="index"
              :title="item.title"
              :icon="item.icon"
              :color="item.color"
            >
            </dialogue-tool-tips>
          </div>
        </v-speed-dial>
      </div>
      <div class="flex justify-center overflow-hidden">
        <LineChart :height="220"></LineChart>
      </div>
    </div>
  </div>
</template>
<script>
import LineChart from "../../admin/charts/SMS-sent-LineChart.vue";
import DialogueToolTips from "../DialougeToolTip.vue";
export default {
  components: { LineChart, DialogueToolTips },
  data() {
    return {
      fabFour: "",
      dialogueToolTips: [
        {
          icon: "mdi-help",
          title: "Check Dialogue",
          color: "light-blue darken-1",
        },
      ],
    };
  },
};
</script>