<template>
  <div class="px-5 pt-2">
    <div>
      <v-breadcrumbs :items="breadcrumbsItems">
        <template v-slot:divider>
          <v-icon>mdi-chevron-right</v-icon>
        </template>
      </v-breadcrumbs>
    </div>
    <div class="w-full h-96">
      <div class="grid gap-5 grid-cols-12">
        <div
          class="
            col-span-12
            md:col-span-4
            h-96
            rounded-xl
            shadow-md
            flex
            justify-center
            pt-10
            bg-gradient-to-br
            from-blue-100
            to-blue-300
          "
        >
          <div class="flex-col">
            <div
              class="
                rounded-full
                shadow-lg
                border-2
                p-0.5
                border-gray-50
                w-40
                h-40
              "
            >
              <img
                src="/images/admin.jpg"
                class="object-cover rounded-full w-full h-full"
                alt=""
              />
            </div>

            <div class="mt-5">
              <h5
                class="
                  drop-shadow-xl
                  text-lg
                  font-semibold
                  text-gray-200 text-center
                "
              >
                Aashish Aryal
              </h5>
            </div>
            <div class="mt-5">
              <h5 class="drop-shadow-xl text-center">aashish121@gmail.com</h5>
            </div>
          </div>
        </div>
        <div class="col-span-12 md:col-span-8 h-96 bg-yellow-300"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      breadcrumbsItems: [
        {
          text: "Dashboard",
          disabled: false,
          href: "/",
        },
        {
          text: "Profile",
          disabled: true,
        },
      ],
    };
  },
};
</script>