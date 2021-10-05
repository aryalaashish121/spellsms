<template>
  <div>
    <v-dialog
      v-model="addSenderIdDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text body-1" elevation="5">
          <v-icon dark left> mdi-card-account-details </v-icon>
          Add Sender ID
          <v-spacer></v-spacer>
          <v-btn dark icon @click="addSenderIdDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  label="Sender ID"
                  outlined
                  prepend-inner-icon="mdi-card-account-details"
                  v-model="form_fields.sender_id"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  label="Company Name"
                  outlined
                  placeholder="Related to sender ID"
                  prepend-inner-icon="mdi-office-building"
                  v-model="form_fields.company_name"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  name="input-7-4"
                  label="Description"
                  placeholder="Explanation of Sender ID"
                  v-model="form_fields.description"
                ></v-textarea>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  name="input-7-4"
                  label="Sample Message"
                  placeholder="example('Hello, your order has been successfully placed.')"
                  v-model="form_fields.sample"
                ></v-textarea>
              </v-row>

              <v-row>
                <v-text-field
                  label="Route"
                  outlined
                  placeholder="Route Type: Transactional or Promotional"
                  prepend-inner-icon="mdi-routes"
                  v-model="form_fields.route"
                ></v-text-field>
              </v-row>
            </v-card-text>
          </v-card>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions class="justify-end">
          <v-btn color="error" text v-on:click="addSenderIdDialog = false">
            <v-icon left> mdi-close</v-icon>Cancel
          </v-btn>
          <v-btn text color="primary" @click="addNew">
            Save <v-icon right> mdi-content-save</v-icon>
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
      column: null,
      addSenderIdDialog: false,
      form_fields: {
        sender_id: "",
        company_name: "",
        description: "",
        sample: "",
        route: "",
      },
    };
  },
  methods: {
    create() {
      const self = this;
      self.addSenderIdDialog = true;
    },

    addNew() {
      const self = this;
      self.url = "create-senderid";
      let response = self.post(self.form_fields);
    },
  },
};
</script>