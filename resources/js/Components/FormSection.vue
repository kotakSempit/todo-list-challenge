<script setup>
import { computed, useSlots } from "vue";

defineEmits(["submitted"]);

const hasActions = computed(() => !!useSlots().actions);
</script>

<template>
  <form class="mb-3" @submit.prevent="$emit('submitted')">
    <div class="card" style="padding:24px">
      <h6 class="mb-0"><slot name="title" /></h6>
      <p><slot name="description" /></p>
      <slot name="form" />
      <div v-if="hasActions" class="mt-3">
        <slot name="actions" />
      </div>
    </div>
  </form>
</template>
