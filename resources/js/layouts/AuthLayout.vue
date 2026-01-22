<script setup lang="ts">
import AuthLayout from '@/layouts/auth/AuthSimpleLayout.vue';

const props = defineProps({
    code: String,
});
</script>

<template>
    <AuthLayout :code="code">
        <slot />
    </AuthLayout>
</template>
