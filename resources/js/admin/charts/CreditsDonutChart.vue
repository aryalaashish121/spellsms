<script>
import { Doughnut } from "vue-chartjs";

export default {
  extends: Doughnut,
  mounted() {
    // Overwriting base render method with actual data.
    this.renderChart({
      labels: ["Used", "Remaining"],
      datasets: [
        {
          label: "SMS Credits",
          backgroundColor: ["#F44336", "#2196F3"],
          data: [5000, 9000],
        },
      ],
    });
  },
};
</script>
