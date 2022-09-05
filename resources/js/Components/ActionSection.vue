<template>
  <div class="mb-3">
    <div class="card" style="padding: 24px">
      <h6 class="mb-0"><slot name="title" /></h6>
      <p><slot name="description" /></p>
      <slot name="content" />
    </div>
  </div>
</template>
