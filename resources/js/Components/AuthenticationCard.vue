<template>
  <div
    class="
      min-vh-100
      d-flex
      flex-column
      align-items-center
      pt-md-6 pt-0
      bg-light
    "
  >
    <div class="my-5">
      <slot name="logo" />
    </div>
    <div class="container d-flex justify-content-center">
      <div
        class="mt-6 card rounded-3 shadow-sm py-5"
        style="width: 460px; padding: 24px"
      >
        <slot />
      </div>
    </div>
    <div class="mt-3 text-center">
      <slot name="footer" />
    </div>
  </div>
</template>
