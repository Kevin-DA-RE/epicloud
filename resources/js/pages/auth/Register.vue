<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { login } from '@/routes';
import { store } from '@/routes/register';
import { Form, Head } from '@inertiajs/vue3';
</script>

<template>
    <AuthBase
        title="Create an account"
        description="Enter your details below to create your account"
    >
        <Head title="Creer un compte" />
        <div
            class="mx-auto flex w-[60vw] flex-row items-center justify-between"
        >
            <img
                src="/logo/logo_inscription.png"
                alt="register"
                class="w-content hidden md:block"
            />
            <Form
                v-bind="store.form()"
                :reset-on-success="['password', 'password_confirmation']"
                v-slot="{ errors, processing }"
                class="flex flex-col gap-6
                md:rounded-xl md:border md:border-white/10 md:bg-white/5 md:p-8 text-white md:shadow-[0_20px_50px_rgba(0,0,0,0.5)] md:ring-1 md:ring-white/10 md:backdrop-blur-2xl"
            >
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="name">Nom de profil</Label>
                        <Input
                            id="name"
                            type="text"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="name"
                            name="name"
                            placeholder="Saisissez votre nom"
                        />
                        <InputError :message="errors.name" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Adresse Email</Label>
                        <Input
                            id="email"
                            type="email"
                            required
                            :tabindex="2"
                            autocomplete="email"
                            name="email"
                            placeholder="email@example.com"
                        />
                        <InputError :message="errors.email" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="password">Mot de passe</Label>
                        <Input
                            id="password"
                            type="password"
                            required
                            :tabindex="3"
                            autocomplete="new-password"
                            name="password"
                            placeholder="Saisissez votre mot de passe"
                        />
                        <InputError :message="errors.password" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="password_confirmation"
                            >Confirmez votre mot de passe</Label
                        >
                        <Input
                            id="password_confirmation"
                            type="password"
                            required
                            :tabindex="4"
                            autocomplete="new-password"
                            name="password_confirmation"
                            placeholder="Confirmez votre mot de passe"
                        />
                        <InputError :message="errors.password_confirmation" />
                    </div>

                    <Button
                        type="submit"
                        class="mt-2 w-full"
                        tabindex="5"
                        :disabled="processing"
                        data-test="register-user-button"
                    >
                        <Spinner v-if="processing" />
                        Créer compte
                    </Button>
                </div>

                <div class="text-center text-sm text-muted-foreground">
                    Déja un compte ?
                    <TextLink
                        :href="login()"
                        class="underline underline-offset-4"
                        :tabindex="6"
                        >Connectez-vous ici</TextLink
                    >
                </div>
            </Form>
        </div>
    </AuthBase>
</template>
