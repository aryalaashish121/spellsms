<template>
  <v-tooltip right>
    <template v-slot:activator="{ on, attrs }">
      <v-btn v-on="on" v-bind="attrs" fab dark x-small :color="color">
        <v-icon>{{ icon }}</v-icon>
      </v-btn>
    </template>
    <span class="text-xs">{{ title }}</span>
  </v-tooltip>
</template>

<script>
export default {
  props: { icon: String, title: String, color: String },
};
</script>