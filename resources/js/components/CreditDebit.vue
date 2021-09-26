
<template>
  <v-container>
    <v-card>
      <v-toolbar flat color="primary" dark>
        <v-toolbar-title
          ><span class="text-base"> User Credits </span></v-toolbar-title
        >
      </v-toolbar>
      <v-tabs vertical>
        <v-tab> Credit </v-tab>
        <v-tab> Debit </v-tab>

        <v-tab-item>
          <v-card flat>
            <v-card-text class="">
              <v-card shaped outlined class="px-5 py-2" elevation="1">
                <v-card-title> Transaction Type: Credit </v-card-title>
                <v-card-text>
                  <div class="flex space-x-1 -mt-3">
                    <div class="h-1 w-20 bg-blue-400 rounded-full shadow"></div>
                    <div class="h-1 w-8 bg-blue-400 rounded-full shadow"></div>
                  </div>
                </v-card-text>
                <v-card-text>
                  <v-row>
                    <v-col cols="12" sm="12" md="4">
                      <v-select
                        prepend-inner-icon="mdi-calendar-clock"
                        label="Select Validity"
                        :items="validity"
                        outlined
                        dense
                      >
                      </v-select>
                    </v-col>

                    <v-col cols="12" sm="12" md="4">
                      <v-text-field
                        label="Allote Credits"
                        placeholder="Enter credits to allote"
                        prepend-inner-icon="mdi-calendar-clock"
                        suffix="SMS"
                        outlined
                        type="number"
                        dense
                      >
                      </v-text-field>
                    </v-col>

                    <v-col cols="12" sm="12" md="4">
                      <v-select
                        prepend-inner-icon="mdi-routes"
                        label="Select Route"
                        :items="routes"
                        outlined
                        dense
                      >
                      </v-select>
                    </v-col>
                  </v-row>
                </v-card-text>
              </v-card>
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <v-card-text>
              <p>
                Morbi nec metus. Suspendisse faucibus, nunc et pellentesque
                egestas, lacus ante convallis tellus, vitae iaculis lacus elit
                id tortor. Sed mollis, eros et ultrices tempus, mauris ipsum
                aliquam libero, non adipiscing dolor urna a orci. Curabitur
                ligula sapien, tincidunt non, euismod vitae, posuere imperdiet,
                leo. Nunc sed turpis.
              </p>

              <p>
                Suspendisse feugiat. Suspendisse faucibus, nunc et pellentesque
                egestas, lacus ante convallis tellus, vitae iaculis lacus elit
                id tortor. Proin viverra, ligula sit amet ultrices semper,
                ligula arcu tristique sapien, a accumsan nisi mauris ac eros. In
                hac habitasse platea dictumst. Fusce ac felis sit amet ligula
                pharetra condimentum.
              </p>

              <p>
                Sed consequat, leo eget bibendum sodales, augue velit cursus
                nunc, quis gravida magna mi a libero. Nam commodo suscipit quam.
                In consectetuer turpis ut velit. Sed cursus turpis vitae tortor.
                Aliquam eu nunc.
              </p>

              <p>
                Etiam ut purus mattis mauris sodales aliquam. Ut varius
                tincidunt libero. Aenean viverra rhoncus pede. Duis leo. Fusce
                fermentum odio nec arcu.
              </p>

              <p class="mb-0">
                Donec venenatis vulputate lorem. Aenean viverra rhoncus pede. In
                dui magna, posuere eget, vestibulum et, tempor auctor, justo.
                Fusce commodo aliquam arcu. Suspendisse enim turpis, dictum sed,
                iaculis a, condimentum nec, nisi.
              </p>
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
    </v-card>
  </v-container>
</template>

 
<script>
export default {
  data() {
    return {
      tabs: ["Credit", "Debit"],

      validity: ["1 Month", "2 months", "3 Months"],
      routes: ["SMSBIT:100", "SMSBIT:200"],
    };
  },
};
</script>