<template>
  <div>
    <v-dialog v-model="dialog" persistent max-width="750px" scrollable>
      <v-card>
        <v-card-title class="primary white--text title" elevation="5">
          <v-icon dark left> mdi-phone </v-icon>
          Add Contact
          <v-spacer></v-spacer>
          <v-btn dark icon @click="dialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-4">
              <v-row>
                <v-select
                  label="Contact Group"
                  outlined
                  v-model="form_fields.contact_group_id"
                  :items="contactGroupList"
                  item-value="id"
                  item-text="name"
                  prepend-inner-icon="mdi-account-group"
                  type="number"
                  class="body-2"
                ></v-select>
              </v-row>

              <v-row>
                <v-text-field
                  v-model="form_fields.name"
                  label="Name"
                  outlined
                  prepend-inner-icon="mdi-account"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  v-model="form_fields.mobile"
                  label="Mobile"
                  outlined
                  prepend-inner-icon="mdi-cellphone-basic"
                  type="number"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  v-model="form_fields.email"
                  label="Email"
                  outlined
                  prepend-inner-icon="mdi-email"
                  type="email"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  v-model="form_fields.company"
                  label="Company"
                  outlined
                  prepend-inner-icon="mdi-office-building"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  v-model="form_fields.address"
                  label="Address"
                  outlined
                  prepend-inner-icon="mdi-map-marker"
                  type="text"
                  class="body-2"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-text-field
                  v-model="form_fields.note"
                  label="Note"
                  outlined
                  prepend-inner-icon="mdi-clipboard"
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
          <v-btn text color="primary" @click="addContact">
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
  data() {
    return {
      contactGroupList: [],
      dialog: false,

      form_fields: {
        name: "",
        mobile: "",
        email: "",
        company: "",
        address: "",
        note: "",
        contact_group_id: "",
      },
    };
  },
  mounted() {
    const self = this;
    self.loadContactGroups();
  },
  methods: {
    create() {
      const self = this;
      self.dialog = true;
    },

    async loadContactGroups() {
      const self = this;
      self.url = "/all-contact-groups";
      self.contactGroupList = await self.getData();
    },

    async addContact() {
      const self = this;
      self.url = "/add-contact";
      try {
        let response = self.post(self.form_fields);
        self.$eventBus.$emit("contacts_data");
        self.dialog = false;
      } catch (err) {
        console.log(err);
      }
    },
  },
};
</script>