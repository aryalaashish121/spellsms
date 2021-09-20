<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,
  mounted() {
    // Overwriting base render method with actual data.
    this.renderChart({
      labels: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ],
      datasets: [
        {
          label: "SMS Summary",
          backgroundColor: "#3399ff",
          data: [40, 20, 32, 79, 50, 20, 29, 45, 26, 60, 72, 81],
        },
      ],
    });
  },
};
</script>
