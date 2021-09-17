<template>
  <div>
    <v-dialog
      v-model="addContactDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text title" elevation="5">
          <v-icon dark left> mdi-phone </v-icon>
          Add Contact
          <v-spacer></v-spacer>
          <v-btn dark icon @click="addContactDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  label="Contact No."
                  outlined
                  prepend-inner-icon="mdi-phone"
                  type="number"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  label="Contact Name"
                  outlined
                  prepend-inner-icon="mdi-account"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  label="Email"
                  outlined
                  prepend-inner-icon="mdi-email"
                  type="email"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  label="Address"
                  outlined
                  prepend-inner-icon="mdi-map-marker"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  label="Note"
                  outlined
                  prepend-inner-icon="mdi-clipboard"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-select
                  label="Contact No."
                  outlined
                  :items="contactGroupList"
                  prepend-inner-icon="mdi-account-group"
                  type="number"
                  class="body-2"
                ></v-select>
              </v-row>
            </v-card-text>
          </v-card>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions class="justify-end">
          <v-btn color="error" text v-on:click="addContactDialog = false">
            <v-icon left> mdi-close</v-icon>Cancel
          </v-btn>
          <v-btn text color="primary">
            Save <v-icon right> mdi-content-save</v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>
<style>
</style>
<script>
export default {
  data: () => ({
    addContactDialog: false,
    contactGroupList: ["Managers", "Influencers"],
  }),

  methods: {
    create() {
      const self = this;
      self.addContactDialog = true;
    },
  },
};
</script>