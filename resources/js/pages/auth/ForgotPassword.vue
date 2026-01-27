<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthLayout from '@/layouts/AuthLayout.vue';
import { login } from '@/routes';
import { email } from '@/routes/password';
import { Form, Head } from '@inertiajs/vue3';

const props = defineProps({
    code: String,
    status: String,
});
</script>

<template>
    <AuthLayout :code="props.code">
        <Head title="Mot de passe oublié" />
                    <div
                v-if="status"
                class="mb-4 text-center text-sm font-medium text-green-600"
            >
                {{ status }}
            </div>
        <div
            class="mx-auto flex flex-row items-center justify-between md:w-[60vw]"
        >
            <img
                src="/logo/logo_forgot_password.png"
                alt="register"
                class="hidden w-100 md:block"
            />


            <div class="space-y-6">
                <Form v-bind="email.form()"
                v-slot="{ errors, processing }"
                class="flex flex-col gap-6 text-white md:w-80 md:rounded-xl md:border md:border-white/10 md:bg-white/5 md:p-8 md:shadow-[0_20px_50px_rgba(0,0,0,0.5)] md:ring-1 md:ring-white/10 md:backdrop-blur-2xl"
                >
                    <div class="grid gap-2">
                        <Label for="email">Adresse email de l'utilisateur</Label>
                        <Input
                            id="email"
                            type="email"
                            name="email"
                            autocomplete="off"
                            autofocus
                            placeholder="email@example.com"
                        />
                        <InputError :message="errors.email" />
                    </div>

                    <div class="my-6 flex items-center justify-start">
                        <Button
                            class="w-full"
                            :disabled="processing"
                            data-test="email-password-reset-link-button"
                        >
                            <Spinner v-if="processing" />
                            Réinitialisation
                        </Button>
                    </div>
                </Form>

                <div
                    class="space-x-1 text-center text-sm text-muted-foreground"
                >
                    <span>Si tu t'en souviens reconnecte toi </span>
                    <TextLink :href="login()">ici</TextLink>
                </div>
            </div>
        </div>
    </AuthLayout>
</template>
