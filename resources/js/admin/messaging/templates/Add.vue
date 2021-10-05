<template>
  <div>
    <v-dialog
      v-model="createTemplateDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text body-1" elevation="5">
          <v-icon dark left> mdi-shape </v-icon>
          Create Template
          <v-spacer></v-spacer>
          <v-btn dark icon @click="createTemplateDialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
        </v-card-title>
        <v-card-text>
          <v-card flat>
            <v-card-text class="mt-3">
              <v-row>
                <v-text-field
                  label="Template Name"
                  outlined
                  prepend-inner-icon="mdi-shape"
                  v-model="form_fields.name"
                ></v-text-field>
              </v-row>

              <v-row>
                <v-textarea
                  v-model="form_fields.description"
                  outlined
                  name="input-7-4"
                  label="Template Text"
                  placeholder="Enter content for SMS template. You can use variables in the text enclosing them in braces, e.g. Hi {name}, your account expires on {date} ......... and so on."
                ></v-textarea>
              </v-row>
            </v-card-text>

            <v-divider></v-divider>

            <v-card-actions class="justify-end">
              <v-btn
                color="error"
                text
                v-on:click="createTemplateDialog = false"
              >
                <v-icon left> mdi-close</v-icon>Cancel
              </v-btn>
              <v-btn text color="primary" @click="addNew" :loading="loading">
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
      createTemplateDialog: false,
      loading: false,

      form_fields: {
        name: "",
        description: "",
      },
    };
  },

  methods: {
    create() {
      const self = this;
      self.createTemplateDialog = true;
    },

    async addNew() {
      const self = this;
      self.url = "/add-template";
      try {
        self.post(self.form_fields);
        self.$eventBus.$emit("templateData");
        self.createTemplateDialog = false;
      } catch (err) {
        console.log(err);
      }
    },
  },
};
</script>