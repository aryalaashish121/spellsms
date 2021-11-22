<template>
  <div data-aos="zoom-out" data-aos-duration="1000" class="p-5 md:px-3 md:py-2">
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <v-data-table
      v-model="selected"
      :headers="headers"
      :items="lowCreditUsers"
      class="shadow border rounded-xl"
      :search="search"
      item-key="login_id"
      show-select
    >
      <template v-slot:top>
        <v-toolbar flat class="rounded-xl">
          <v-toolbar-title>
            <v-icon class="pb-1" left> mdi-gauge-low </v-icon>
            <span class="text-base"> Low Credit Users (less than 500) </span>
          </v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>

          <v-text-field
            v-model="search"
            dense
            outlined
            prepend-inner-icon="mdi-magnify"
            label="Search"
            single-line
            hide-details
            class="text-sm shadow-inner"
          ></v-text-field>
          <v-spacer></v-spacer>
        </v-toolbar>
      </template>
    </v-data-table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      selected: [],

      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Low Credit Users",
          disabled: true,
        },
      ],

      headers: [
        {
          text: "User Details",
          align: "start",
          sortable: false,
          value: "login_id",
        },
        { text: "Route Details", value: "route" },
      ],

      lowCreditUsers: [
        {
          login_id: "bistap98",
          route: "SMSBIT (1)",
        },
        {
          login_id: "nikesh009",
          route: "SMSBIT (6)",
        },
      ],
    };
  },
};
</script>