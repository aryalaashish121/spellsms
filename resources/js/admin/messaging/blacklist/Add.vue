<template>
  <div>
    <v-dialog
      v-model="addBlacklistDialog"
      persistent
      max-width="450px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text body-1" elevation="5">
          <v-icon dark left> mdi-account-off </v-icon>
          Add Blacklist
          <v-spacer></v-spacer>
          <v-btn dark icon @click="addBlacklistDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  label="Contact Number"
                  outlined
                  type="number"
                  prepend-inner-icon="mdi-phone"
                  v-model="form_fields.mobile"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  label="Name"
                  outlined
                  type="text"
                  prepend-inner-icon="mdi-text"
                  v-model="form_fields.name"
                ></v-text-field>
              </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="justify-end">
              <v-btn color="error" text v-on:click="addBlacklistDialog = false">
                <v-icon left> mdi-close</v-icon>Cancel
              </v-btn>
              <v-btn text color="primary" @click="createNew">
                Save <v-icon right> mdi-content-save</v-icon>
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      checkbox: false,
      addBlacklistDialog: false,
      form_fields: {
        name: "",
        mobile: "",
      },
    };
  },
  methods: {
    create() {
      const self = this;
      self.addBlacklistDialog = true;
    },

    createNew() {
      const self = this;
      self.url = "/add-blacklist-contact";

      let data = {
        name: self.form_fields.name,
        mobile: self.form_fields.mobile,
      };
      let response = self.post(data);
    },
  },
};
</script>
