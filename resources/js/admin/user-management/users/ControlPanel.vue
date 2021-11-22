<template>
  <div>
    <v-card flat class="p-0">
      <v-card-text class="mt-2">
        <template>
          <v-card>
            <v-card flat>
              <v-card-text>
                <div class="flex justify-between">
                  <div>
                    <h1 class="text-xl flex">Overview</h1>
                    <div class="flex space-x-1 pl-1">
                      <div class="w-10 h-1 bg-blue-400 rounded-full"></div>
                      <div class="w-4 h-1 bg-blue-400 rounded-full"></div>
                    </div>
                  </div>

                  <div
                    class="
                      shadow-inner
                      bg-gray-100
                      rounded
                      px-5
                      py-2
                      cursor-pointer
                      group
                      hover:bg-gray-400
                      hover:text-white
                      hover:shadow-lg
                      transition
                      ease-out
                      duration-300
                    "
                  >
                    <h2>
                      <i class="mr-1 fas fa-map-signs group-hover:text-white">
                      </i>
                      <strong>Route : </strong> SMBIT22
                    </h2>
                  </div>
                </div>

                <div
                  class="
                    grid grid-cols-1
                    md:grid-cols-2
                    lg:grid-cols-3
                    gap-5
                    mt-6
                  "
                >
                  <AccountInfo></AccountInfo>
                  <CompanyInfo></CompanyInfo>
                  <AccountManager></AccountManager>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-5">
                  <SmsCredits></SmsCredits>
                  <LineChartSMS></LineChartSMS>
                </div>
              </v-card-text>
            </v-card>
          </v-card> </template
      ></v-card-text>
    </v-card>
  </div>
</template>
<script>
import AccountInfo from "../../../components/Account-Control-Panel/AccountInfo.vue";
import CompanyInfo from "../../../components/Account-Control-Panel/CompanyInfo.vue";
import AccountManager from "../../../components/Account-Control-Panel/AccountManager.vue";
import SmsCredits from "../../../components/Account-Control-Panel/SmsCredits.vue";
import LineChartSMS from "../../../components/Account-Control-Panel/LineChartSMS.vue";

export default {
  components: {
    AccountInfo,
    CompanyInfo,
    AccountManager,
    SmsCredits,
    LineChartSMS,
  },
  data() {
    return {
      route: [{ route: "SMSBIT (RouteID: 116)", info: "5 SMS available" }],
    };
  },
};
</script>
