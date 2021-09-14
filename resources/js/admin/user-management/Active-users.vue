<template>
  <div class="p-5 md:p-8">
    <div class="border rounded-lg shadow pb-3 pt-7">
      <AddUser ref="addUser"> </AddUser>
      <v-simple-table dense>
        <template v-slot:top>
          <v-toolbar flat>
            <v-toolbar-title>
              <v-icon class="pb-1" left> mdi-account-clock </v-icon>
              Active Users
            </v-toolbar-title>
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-spacer></v-spacer>

            <v-btn color="primary" @click="addUser">
              <v-icon left small> mdi-plus </v-icon>
              Add
            </v-btn>
          </v-toolbar>
        </template>
        <template v-slot:default>
          <thead>
            <tr>
              <th class="text-left">Customer</th>
              <th class="text-left">Date</th>
              <th class="text-left">Credit</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="customer in customers" :key="customer.name">
              <td>{{ customer.name }}</td>
              <td>{{ customer.date }}</td>
              <td>{{ customer.credit }}</td>
            </tr>
          </tbody>
        </template>
      </v-simple-table>
    </div>
  </div>
</template>
<script>
import AddUser from "./Add-User";
export default {
  components: { AddUser },
  data() {
    return {
      customers: [
        {
          name: "Aashish Aryal",
          date: "21 Aug, 2021",
          credit: "Rs. 50,000",
        },
        {
          name: "Sunil Aryal",
          date: "5 Sept, 2021",
          credit: "Rs. 30,000",
        },
        {
          name: "Nikesh Aryal",
          date: "17 Aug, 2021",
          credit: "Rs. 10,000",
        },
        {
          name: "Subham Aryal",
          date: "10 Aug, 2021",
          credit: "Rs. 100,000",
        },
      ],
    };
  },

  methods: {
    addUser() {
      const self = this;
      self.$refs.addUser.add();
    },
  },
};
</script>