<template>
  <div
    class="grid gap-5 md:grid-cols-4"
    data-aos="fade-down"
    data-aos-duration="700"
  >
    <div
      class="
        bg-gradient-to-br
        from-blue-600
        to-blue-400
        h-24
        rounded-md
        shadow-md
        transition
        duration-500
        ease-in-out
        transform
        hover:-translate-y-3
        hover:shadow-xl
        cursor-pointer
      "
    >
      <a
        href="/activeUsers"
        style="text-decoration: none"
        class="cursor-pointer"
      >
        <div class="flex justify-between px-4 py-2">
          <div class="text-white">
            <h5 class="font-light text-lg">Total Users</h5>
            <p class="text-3xl mt-3">11</p>
          </div>
          <div class="mt-4">
            <v-icon size="40" color="#FFFFFF" class="opacity-70">
              mdi-account-group
            </v-icon>
          </div>
        </div>
      </a>
    </div>

    <div
      class="
        bg-gradient-to-br
        from-green-600
        to-green-500
        h-24
        rounded-lg
        shadow-md
        transition
        duration-500
        ease-in-out
        transform
        hover:-translate-y-3
        hover:shadow-xl
        cursor-pointer
      "
    >
      <div class="flex justify-between px-4 py-2">
        <div class="text-white">
          <h5 class="font-light text-lg">Total Sales</h5>
          <p class="text-3xl mt-3">5</p>
        </div>
        <div class="mt-4">
          <v-icon size="40" color="#FFFFFF" class="opacity-70">
            mdi-cash
          </v-icon>
        </div>
      </div>
    </div>

    <div
      class="
        bg-gradient-to-br
        from-yellow-500
        to-yellow-400
        h-24
        rounded-lg
        shadow-md
        transition
        duration-500
        ease-in-out
        transform
        hover:-translate-y-3
        hover:shadow-xl
        cursor-pointer
      "
    >
      <div class="flex justify-between px-4 py-2">
        <div class="text-white">
          <h5 class="font-light text-lg">Total SMS</h5>
          <p class="text-3xl mt-3">5</p>
        </div>
        <div class="mt-4">
          <v-icon size="40" color="#FFFFFF" class="opacity-70">
            mdi-email-multiple-outline
          </v-icon>
        </div>
      </div>
    </div>

    <div
      class="
        bg-gradient-to-br
        from-red-600
        to-red-400
        h-24
        rounded-lg
        shadow-md
        transition
        duration-500
        ease-in-out
        transform
        hover:-translate-y-3
        hover:shadow-xl
        cursor-pointer
      "
    >
      <div class="flex justify-between px-4 py-2">
        <div class="text-white">
          <h5 class="font-light text-lg">Suspended</h5>
          <p class="text-3xl mt-3">5</p>
        </div>
        <div class="mt-4">
          <v-icon size="40" color="#FFFFFF" class="opacity-70">
            mdi-account-remove
          </v-icon>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>