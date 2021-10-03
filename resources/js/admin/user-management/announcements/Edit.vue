<template>
  <div>
    <v-dialog
      v-model="createAnnouncementDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text" elevation="5">
          <v-icon dark left> mdi-bullhorn </v-icon>
          Create Announcement
          <v-spacer></v-spacer>
          <v-btn dark icon @click="createAnnouncementDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-select
                  :items="displayToList"
                  label="Display to"
                  outlined
                  prepend-inner-icon="mdi-account-cog"
                ></v-select>
              </v-row>

              <v-row class="flex space-x-2">
                <v-label> Annoucement Type : </v-label>
                <div class="-mt-6">
                  <v-radio-group v-model="column" column>
                    <v-radio
                      color="orange"
                      label="Good News or Positive Info"
                      value="radio-1"
                    ></v-radio>
                    <v-radio
                      color="primary"
                      label="General Information"
                      value="radio-2"
                    ></v-radio>
                    <v-radio
                      color="red"
                      label="Warning or Error Notification"
                      value="radio-3"
                    ></v-radio>
                  </v-radio-group>
                </div>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  name="input-7-4"
                  label="Display Text"
                  placeholder="Enter text to dsiplay as announcement"
                ></v-textarea>
              </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="justify-end">
              <v-btn
                color="error"
                text
                v-on:click="createAnnouncementDialog = false"
              >
                <v-icon left> mdi-close</v-icon>Cancel
              </v-btn>
              <v-btn text color="primary">
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
  data: () => ({
    column: null,
    createAnnouncementDialog: false,
    displayToList: [{
        type:"All Users & Resellers",
        id:"all"
    },
    {
        type:"Only All Resellers",
        id:"resellers"
    },
    {
        type:"Only All Users",
        id:"clients"
    }],
    row: null,
  }),

  methods: {
    create() {
      const self = this;
      self.createAnnouncementDialog = true;
    },
  },
};
</script>