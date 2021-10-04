<template>
  <div>
    <v-dialog max-width="650" v-model="dialog" scrollable persistent>
      <v-card>
        <v-card-title class="title primary white--text">
          Select Date & Time
          <v-spacer></v-spacer>
          <v-btn icon dark @click="dialog = false">
            <v-icon> mdi-close </v-icon>
          </v-btn>
        </v-card-title>

        <v-card-text height="700px">
          <v-row>
            <v-col cols="12" sm="12" lg="6">
              <v-date-picker class="mt-2" v-model="picker" flat></v-date-picker>
            </v-col>

            <v-col cols="12" sm="12" lg="6">
              <v-time-picker class="mt-2" format="ampm"></v-time-picker>
            </v-col>
          </v-row>
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
      picker: null,
    };
  },

  methods: {
    open() {
      const self = this;
      self.dialog = true;
    },
  },
};
</script>