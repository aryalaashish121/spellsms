<template>
  <div>
    <v-dialog
      v-model="addAccountManagerDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text" elevation="5">
          <v-icon dark left> mdi-account-tie </v-icon>
          Create Account Manager
          <v-spacer></v-spacer>
          <v-btn dark icon @click="addAccountManagerDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  outlined
                  prepend-inner-icon="mdi-account-tie"
                  placeholder="Manager Name"
                  type="text"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  outlined
                  prepend-inner-icon="mdi-email"
                  placeholder="Email Id"
                  type="email"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  outlined
                  prepend-inner-icon="mdi-phone"
                  placeholder="Mobile Number"
                  type="number"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  outlined
                  prepend-inner-icon="mdi-whatsapp"
                  placeholder="WhatsApp Number"
                  type="number"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  outlined
                  prepend-inner-icon="mdi-skype"
                  placeholder="Skype Id"
                  type="text"
                ></v-text-field>
              </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="justify-end">
              <v-btn
                color="error"
                text
                v-on:click="addAccountManagerDialog = false"
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
    addAccountManagerDialog: false,
  }),

  methods: {
    create() {
      const self = this;
      self.addAccountManagerDialog = true;
    },
  },
};
</script>