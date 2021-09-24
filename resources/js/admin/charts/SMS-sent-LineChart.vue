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
          label: "SMS Sent",
          backgroundColor: "#BBDEFB",
          data: [5, 10, 20, 30, 50, 100, 70, 80, 30, 0, 0, 0],
        },
      ],
    });
  },
};
</script>
