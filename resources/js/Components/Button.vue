<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
    colour: {
        type: String,
        default: 'btn-primary',
    },
});
</script>

<template>
    <button :type="type" class="btn px-4" :class="colour">
        <slot />
    </button>
</template>
