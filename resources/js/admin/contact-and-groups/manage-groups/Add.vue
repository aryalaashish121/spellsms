<template>
  <div>
    <v-dialog v-model="dialog" persistent max-width="450px" scrollable>
      <v-card>
        <v-card-title class="primary white--text body-1" elevation="5">
          <v-icon dark left> mdi-account-group </v-icon>
          Add Group
          <v-spacer></v-spacer>
          <v-btn dark icon @click="dialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  v-model="form_fields.name"
                  label="Group Name"
                  outlined
                  prepend-inner-icon="mdi-account-group"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>
            </v-card-text>
          </v-card>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions class="justify-end">
          <v-btn color="error" text v-on:click="dialog = false">
            <v-icon left> mdi-close</v-icon>Cancel
          </v-btn>
          <v-btn
            text
            color="primary"
            @click="addContactGroup"
            :loading="loading"
          >
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
      dialog: false,
      loading: false,

      form_fields: {
        name: "",
      },
    };
  },

  methods: {
    create() {
      const self = this;
      self.dialog = true;
    },

    async addContactGroup() {
      const self = this;
      self.url = "/add-contact-group";
      try {
        let response = self.post(self.form_fields);
        self.$eventBus.$emit("contact_groups_data");
        self.dialog = false;
      } catch (err) {
        console.log(err);
      }
    },
  },
};
</script>
