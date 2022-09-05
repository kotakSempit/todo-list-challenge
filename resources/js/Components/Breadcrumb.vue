<script setup>
defineProps({
  subtitle: {
    type: String,
    default: "",
  },
});
</script>

<template>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item h5 mb-0">
        <a class="text-decoration-none" href="#" style="margin-bottom: -4px">
          Home
        </a>
        <i class="fas fa-chevron-right fa-xs fa-fw"></i>
      </li>
      <li class="breadcrumb-item active h5 mb-0" aria-current="page">
        <span class="text-decoration-none" style="margin-bottom: -4px">
          Library
        </span>
      </li>
    </ol>
  </nav>
</template>