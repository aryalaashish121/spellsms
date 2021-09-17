<template>
  <div>
    <v-dialog v-model="dialog" persistent max-width="550px" scrollable>
      <v-card>
        <v-card-title class="primary white--text" elevation="5">
          <v-icon dark left> mdi-download </v-icon>
          Import Contact
          <v-spacer></v-spacer>
          <v-btn dark icon @click="dialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-select
                  label="Select Group"
                  outlined
                  :items="contactGroupList"
                  prepend-inner-icon="mdi-account-group"
                  type="number"
                ></v-select>
              </v-row>

              <v-row class="flex">
                <v-label>Upload File : </v-label>
                <div class="-mt-2">
                  <v-chip dark x-small class="ma-2" color="secondary">
                    <v-icon class="mr-1">mdi-paperclip</v-icon>
                    xls or xlsx
                  </v-chip>
                </div>
              </v-row>

              <v-row>
                <v-file-input
                  class="mt-3"
                  v-model="files"
                  placeholder="Upload your documents"
                  label="Browse"
                  multiple
                  solo
                  prepend-icon="mdi-paperclip"
                >
                  <template v-slot:selection="{ text }">
                    <v-chip small label color="primary">
                      {{ text }}
                    </v-chip>
                  </template>
                </v-file-input>
              </v-row>

              <v-row class="flex">
                <v-label>Copy/Paste Numbers : </v-label>
                <div class="-mt-2">
                  <v-chip dark x-small class="ma-2" color="secondary">
                    <v-icon class="mr-1">mdi-content-copy</v-icon>
                    txt or csv
                  </v-chip>
                </div>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  placeholder="Copy Paste numbers separated by newline"
                >
                </v-textarea>
              </v-row>
            </v-card-text>
          </v-card>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions class="justify-end">
          <v-btn color="error" text v-on:click="dialog = false">
            <v-icon left> mdi-close</v-icon>Cancel
          </v-btn>
          <v-btn text color="primary">
            Import <v-icon right> mdi-content-save</v-icon>
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data: () => ({
    dialog: false,
    contactGroupList: ["Managers", "Influencers"],
  }),

  methods: {
    upload() {
      const self = this;
      self.dialog = true;
    },
  },
};
</script>