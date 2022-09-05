<script setup>
import { computed } from "vue";

const emit = defineEmits(["update:checked"]);

const props = defineProps({
  checked: {
    type: [Array, Boolean],
    default: false,
  },
  value: {
    type: String,
    default: null,
  },
  name: {
    type: String,
    default: null,
    required: true,
  },
  label: {
    type: String,
    default: null,
    required: true,
  },
});

const proxyChecked = computed({
  get() {
    return props.checked;
  },

  set(val) {
    emit("update:checked", val);
  },
});
</script>


<template>
  <div class="form-check">
    <input
      v-model="proxyChecked"
      type="checkbox"
      :value="value"
      class="form-check-input"
      :id="name"
    />
    <label class="form-check-label" :for="name">
      {{ label }}
    </label>
  </div>
</template>
