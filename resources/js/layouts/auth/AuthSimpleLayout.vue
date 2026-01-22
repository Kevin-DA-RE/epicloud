<script setup>
import { ref } from 'vue';
const props = defineProps({
    code: String,
});

const title = ref();
const description = ref();

switch (props.code) {
    case 'register':
        title.value = 'Créer un compte';
        description.value = 'Accès sécurisé';
        break;
    case 'login':
        title.value = 'Se connecter';
        description.value = 'Connection à votre compte';
        break;
}
</script>

<template>
    <div
        class="flex min-h-svh [animation:gradient-shift_12s_ease_infinite] flex-col items-center justify-center gap-6 bg-background bg-gradient-to-br from-slate-950 via-purple-900 to-indigo-950 bg-[length:200%_200%] p-6 md:p-10"
    >
        <div class="flex w-screen flex-col gap-2">
            <div
                class="mb-8 animate-in space-y-2 text-center duration-1000 fade-in slide-in-from-bottom-4"
            >
                <div class="mx-auto flex items-center justify-center">
                    <h1
                        class="ml-2 text-4xl font-medium tracking-wide text-purple-100 md:text-5xl"
                        style="font-family: pacifico; font-style: italic"
                    >
                        {{ title }}
                    </h1>
                </div>
                <div
                    class="mx-auto h-px w-32 bg-gradient-to-r from-transparent via-purple-400/50 to-transparent"
                ></div>
                <p
                    class="text-sm font-light tracking-[0.2em] text-purple-300/60 uppercase"
                >
                    <span class="text-3xl drop-shadow-md filter">🔐</span>
                    {{ description }}
                </p>
            </div>
            <slot />
        </div>
    </div>
</template>
<style>
@keyframes gradient-shift {
    0%,
    100% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
}
</style>
