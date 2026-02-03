<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const descriptif = ref([
    'EpiCloud est une application médicale conçue pour offrir une gestion simple, fiable et moderne du suivi épileptologique.',
    'Pensée pour les proches aidants des patients épileptiques, elle permet de faire la communication entre le patient et les medecins a travers une interface fluide et simple.',
    'Grâce à une architecture soignée et une interface chaleureuse, EpiCloud permet de documenter chaque événement médical — crises, symptômes, traitements, rendez-vous, facteurs déclenchants — avec une précision qui facilite la compréhension de l’évolution de la maladie.',
    'Chaque donnée est structurée pour être utile, lisible et exploitable, sans complexité inutile.',
]);

withDefaults(
    defineProps<{
        canRegister: boolean;
    }>(),
    {
        canRegister: true,
    },
);

const isLoaded = ref(false);

onMounted(() => {
    setTimeout(() => {
        isLoaded.value = true;
    }, 2500); // Petit délai pour laisser le gradient s'afficher
});
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div
        class="flex min-h-svh [animation:gradient-shift_12s_ease_infinite] flex-col bg-background bg-gradient-to-br from-slate-950 via-purple-900 to-indigo-950 bg-[length:200%_200%] text-white"
    >
        <header class="w-full p-6 lg:mx-auto lg:max-w-7xl">
            <nav class="flex items-center justify-between gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="dashboard()"
                    class="rounded-sm border border-[#3E3E3A] px-5 py-1.5 text-sm hover:border-[#62605b]"
                >
                    EpiCloud
                </Link>
                <template v-else>
                    <h2
                        class="text-3xl md:text-5xl"
                        style="font-family: pacifico; font-style: italic"
                    >
                        EpiCloud
                    </h2>
                    <div class="flex items-end gap-5">
                        <Link
                            :href="login()"
                            class="rounded-sm border border-transparent py-1.5 text-sm hover:border-[#3E3E3A]"
                        >
                            Connecter
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="register()"
                            class="rounded-sm border border-[#3E3E3A] py-1.5 text-sm hover:border-[#62605b]"
                        >
                            S'inscrire
                        </Link>
                    </div>
                </template>
            </nav>
        </header>

        <main
            class="relative flex grow items-center justify-center overflow-hidden p-4 md:p-10"
        >
            <div
                class="relative flex w-full max-w-6xl items-center justify-center transition-all duration-1000 md:space-x-50"
            >
                <div
                    class="flex items-center justify-center transition-all duration-1000 ease-in-out"
                    :class="[
                        isLoaded
                            ? 'scale-100 opacity-20 md:opacity-100'
                            : 'scale-110 opacity-100',
                    ]"
                >
                    <div
                        class="transition-all duration-1000"
                        :class="
                            isLoaded ? 'md:-translate-x-1/2' : 'translate-x-0'
                        "
                    >
                        <img
                            src="/logo/logo_epicloud.png"
                            alt="logo"
                            class="max-h-[50vh] w-auto object-contain md:max-h-[70vh]"
                        />
                    </div>
                </div>

                <div
                    class="absolute z-10 w-full max-w-md space-y-6 transition-all delay-500 duration-1000 md:max-w-xl"
                    :class="[
                        isLoaded
                            ? 'scale-100 opacity-100'
                            : 'pointer-events-none scale-95 opacity-0',
                    ]"
                >
                    <div
                        class="transition-all duration-1000"
                        :class="
                            isLoaded ? 'md:translate-x-1/2' : 'translate-x-0'
                        "
                    >
                        <h4
                            class="text-center text-2xl md:text-left md:text-3xl"
                            style="font-family: pacifico; font-style: italic"
                        >
                            Bonjour et bienvenue sur Epicloud, le suivi épileptique, centralisé et accessible.
                        </h4>

                        <div
                            class="custom-scrollbar mt-6 max-h-[60vh] overflow-y-auto pr-4"
                        >
                            <ul class="space-y-4">
                                <li
                                    v-for="desc in descriptif"
                                    :key="desc"
                                    style="list-style: disc"
                                    class="ml-5 text-lg text-slate-200"
                                >
                                    {{ desc }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="hidden h-10 lg:block"></footer>
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
