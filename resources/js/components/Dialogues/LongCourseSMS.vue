<template>
  <div>
    <v-dialog max-width="450" v-model="dialog" persistent>
      <v-card>
        <v-card-title class="title primary white--text">
          Schedule SMS
          <v-spacer></v-spacer>
          <v-btn icon dark @click="dialog = false">
            <v-icon> mdi-close </v-icon>
          </v-btn>
        </v-card-title>

        <v-card-text class="mt-3">
          <v-label for=""> Send : (No. of SMS) </v-label>
          <v-text-field
            outlined
            dense
            prepend-inner-icon="mdi-email"
            suffix="SMS"
            type="number"
            class="mt-1"
          >
          </v-text-field>

          <v-label for=""> Every : (hour/s) </v-label>
          <v-select
            outlined
            dense
            :items="hoursList"
            prepend-inner-icon="mdi-message-text-clock-outline"
            type="number"
            class="mt-1"
          >
          </v-select>

          <v-label for=""> On : (days) </v-label>
          <v-select
            outlined
            dense
            :items="onList"
            prepend-inner-icon="mdi-calendar-clock-outline"
            type="number"
            class="mt-1"
          >
          </v-select>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions class="justify-end">
          <v-btn text color="red" class="ma-2" @click="dialog = false">
            <v-icon left small> mdi-close </v-icon>
            Cancel
          </v-btn>
          <v-btn text color="primary" class="ma-2">
            Apply
            <v-icon right small> mdi-check-circle-outline </v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<script>
export default {
  data() {
    return {
      dialog: false,
      dates: [],
      hoursList: ["1 hour", "5 Hours", "10 Hours", "24 Hours", "48 Hours"],
      onList: ["All Days", "Weekdays (Mon - Fri)", "Weekends (Sat - Sun)"],
    };
  },

  computed: {
    dateRangeText() {
      return this.dates.join(" ~ ");
    },
  },

  methods: {
    open() {
      const self = this;
      self.dialog = true;
    },
  },
};
</script>