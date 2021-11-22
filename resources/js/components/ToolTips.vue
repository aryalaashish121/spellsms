<template>
  <v-tooltip right>
    <template v-slot:activator="{ on, attrs }">
      <v-btn
        v-on="on"
        v-bind="attrs"
        fab
        dark
        x-small
        :color="color"
        @click="gotToLink"
      >
        <v-icon>{{ icon }}</v-icon>
      </v-btn>
    </template>
    <span class="text-xs">{{ title }}</span>
  </v-tooltip>
</template>

<script>
export default {
  props: {
    data: {
      type: Array,
    },
    icon: String,
    title: String,
    color: String,
    href: String,
  },

  methods: {
    gotToLink() {
      const self = this;
      self.$router.push({
        name: this.href,
        params: { id: this.data.slug },
      });
    },
  },
};
</script>