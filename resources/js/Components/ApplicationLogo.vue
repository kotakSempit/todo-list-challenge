<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
  width: {
    type: String,
    default: "48px",
  },
  height: {
    type: String,
    default: "48px",
  },
  target: {
    type: String,
    default: route("home"),
  },
});
</script>

<template>
  <Link class="text-decoration-none" :href="target">
    <h3 class="mb-0" style="white-space: normal">
      <span class="fw-bold">TODO</span>
      <span class="fw-light">LIST</span> 
    </h3>
  </Link>
</template>
