<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="btn btn-link text-decoration-none px-4">
        <slot />
    </button>
</template>
