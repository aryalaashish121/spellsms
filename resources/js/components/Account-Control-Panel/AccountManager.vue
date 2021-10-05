<template>
  <div
    class="
      col-span-1
      h-96
      rounded-tr-xl rounded-br-xl
      shadow
      border
      transition
      duration-500
      ease-out
      hover:shadow-xl
      hover:bg-gray-400
      hover:text-white
      group
      cursor-pointer
    "
  >
    <div class="w-full h-5 pt-3 pl-4">
      <h1 class="text-xs">Account Manager</h1>
    </div>
    <div class="flex-col mt-3">
      <div
        class="
          w-32
          h-32
          rounded-full
          bg-gray-300
          shadow-md
          border-4 border-gray-400
          group-hover:border-white
          overflow-hidden
          mx-auto
        "
      >
        <img
          src="https://images.pexels.com/photos/6368928/pexels-photo-6368928.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
          class="object-contain w-full h-full"
          alt=""
        />
      </div>
      <div class="text-center flex-col mt-4">
        <h1 class="font-semibold text-lg">Prasidhha Shrestha</h1>
        <h2 class="font-normal text-xs mt-3">
          <i class="fas fa-envelope"></i>
          prashiddhashr09@gmail.com
        </h2>
        <h2 class="font-normal text-xs mt-3">
          <i class="fas fa-phone-square-alt"></i>
          9861205043
        </h2>
        <div
          class="
            w-14
            h-0.5
            bg-gray-700
            group-hover:bg-white
            mx-auto
            mt-2
            rounded-full
            shadow
          "
        ></div>
        <h2 class="font-normal text-xs mt-3">
          <i class="fab fa-whatsapp-square mr-1"></i>
          <b>WhatsApp:</b>
          <span>9861205043</span>
        </h2>
        <h2 class="font-normal text-xs mt-2">
          <i class="fab fa-skype"></i>
          <b>Skype:</b>
          <span> 9861205043 </span>
        </h2>
      </div>
    </div>

    <div class="w-full flex justify-end mt-3 h-12">
      <div class="w-1/6 h-12">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="
            h-10
            w-10
            opacity-50
            group-hover:border-white group-hover:opacity-75
            mx-auto
          "
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </div>
    </div>
  </div>
</template>
<script>
export default {};
</script>