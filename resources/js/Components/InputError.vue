<script setup>
defineProps({
  message: String,
});
</script>

<template>
  <div class="invalid-feedback" v-show="message">
    {{ message }}
  </div>
</template>
