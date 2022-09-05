<template>
  <div class="d-flex justify-content-between align-items-center">
    <div>
      <h4 class="text-lg mb-0">
        <slot name="title" />
      </h4>

      <p class="">
        <slot name="description" />
      </p>
    </div>

    <div>
      <slot name="aside" />
    </div>
  </div>
</template>
