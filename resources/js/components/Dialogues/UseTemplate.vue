<template>
  <v-dialog v-model="dialog" width="500" class="primary">
    <v-card>
      <v-toolbar dark color="primary">
        <v-toolbar-title class="title">
          <v-icon>mdi-shapes</v-icon>
          Use Template
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-toolbar-items>
          <v-btn dark icon small>
            <v-icon @click="dialog = false"> mdi-close </v-icon>
          </v-btn>
        </v-toolbar-items>
      </v-toolbar>

      <v-card-text class="mt-5">
        <v-select
          label="Select Template"
          :items="templates"
          item-value="id"
          item-text="name"
          v-model="template_id"
          outlined
          dense
          prepend-inner-icon="mdi-shape"
          @change="getTemplateSampleMsg"
        >
        </v-select>

        <v-label>Template Description : </v-label>
        <v-textarea
          rows="5"
          outlined
          class="mt-2"
          v-model="sample_msg"
        ></v-textarea>
      </v-card-text>

      <v-divider></v-divider>

      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn color="primary" text @click="dialog = false">
          <v-icon left small> mdi-check-circle-outline </v-icon> Cancel
        </v-btn>
        <v-btn color="primary" text @click="applyTemplate">
          <v-icon left small> mdi-check-circle-outline </v-icon> Apply
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>
<script>
export default {
  data() {
    return {
      dialog: false,
      templates: [],
      form_fields: [],
      template_id: "",
      sample_msg: "",
    };
  },

  mounted() {
    const self = this;
    self.getAllTemplates();
  },

  methods: {
    open() {
      const self = this;
      self.dialog = true;
    },

    async getAllTemplates() {
      const self = this;
      try {
        self.url = "/all-templates";
        self.templates = await self.getData();
      } catch (err) {}
    },

    async getTemplateSampleMsg() {
      const self = this;
      self.url = "/get-template-byid";
      let response = await self.show(self.template_id);
      console.log(response);
      self.sample_msg = response.data.description;
    },

    applyTemplate() {
      const self = this;
      this.$eventBus.$emit("backFire", { msg: self.sample_msg });
      self.dialog = false;
    },
  },
};
</script>