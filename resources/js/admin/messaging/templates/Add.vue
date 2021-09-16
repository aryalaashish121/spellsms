<template>
  <div>
    <v-dialog
      v-model="createTemplateDialog"
      persistent
      max-width="750px"
      scrollable
    >
      <v-card>
        <v-card-title class="primary white--text" elevation="5">
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
                ></v-text-field>
              </v-row>

              <v-row>
                <v-textarea
                  outlined
                  name="input-7-4"
                  label="Template Text"
                  placeholder="Enter content for SMS template. You can use variables in the text enclosing them in braces, e.g. Hi {name}, your account expires on {date} ......... and so on."
                ></v-textarea>
              </v-row>

              <v-row>
                <v-checkbox v-model="checkbox">
                  <template v-slot:label>
                    <div>Request Approval for Transactional Route</div>
                  </template>
                </v-checkbox>
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
    checkbox: false,
    createTemplateDialog: false,
  }),

  methods: {
    create() {
      const self = this;
      self.createTemplateDialog = true;
    },
  },
};
</script>