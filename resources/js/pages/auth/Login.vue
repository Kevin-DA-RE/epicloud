<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Checkbox } from '@/components/ui/checkbox';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import AuthBase from '@/layouts/AuthLayout.vue';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import { Form, Head } from '@inertiajs/vue3';

const props = defineProps({
    code: String,
    canResetPassword: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <AuthBase :code="props.code">
        <Head title="Connection" />
        <div
            class="mx-auto flex flex-row items-center justify-between md:w-[60vw]"
        >
            <img
                src="/logo/logo_login.png"
                alt="register"
                class="hidden w-100 md:block"
            />
            <Form
                v-bind="store.form()"
                :reset-on-success="['password']"
                v-slot="{ errors, processing }"
                class="flex flex-col gap-6 text-white md:w-80 md:rounded-xl md:border md:border-white/10 md:bg-white/5 md:p-8 md:shadow-[0_20px_50px_rgba(0,0,0,0.5)] md:ring-1 md:ring-white/10 md:backdrop-blur-2xl"
            >
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="email">Adresse Mail</Label>
                        <Input
                            id="email"
                            type="email"
                            name="email"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="email"
                            placeholder="email@example.com"
                        />
                        <InputError :message="errors.email" />
                    </div>

                    <div class="grid gap-2">
                        <div class="flex items-center justify-between">
                            <Label for="password">Mot de Passe</Label>
                            <TextLink
                                v-if="props.canResetPassword"
                                :href="request()"
                                class="text-sm"
                                :tabindex="5"
                            >
                                Mot de passe oublié ?
                            </TextLink>
                        </div>
                        <Input
                            id="password"
                            type="password"
                            name="password"
                            required
                            :tabindex="2"
                            autocomplete="current-password"
                            placeholder="Password"
                        />
                        <InputError :message="errors.password" />
                    </div>

                    <div class="flex items-center justify-between">
                        <Label
                            for="remember"
                            class="flex items-center space-x-3"
                        >
                            <Checkbox
                                id="remember"
                                name="remember"
                                :tabindex="3"
                            />
                            <span>Souvenir de moi</span>
                        </Label>
                    </div>

                    <Button
                        type="submit"
                        class="mt-4 w-full"
                        :tabindex="4"
                        :disabled="processing"
                        data-test="login-button"
                    >
                        <Spinner v-if="processing" />
                        Se connecter
                    </Button>
                </div>

                <div
                    class="text-center text-sm text-muted-foreground"
                    v-if="props.canRegister"
                >
                    Pas encore de compte ?
                    <TextLink :href="register()" :tabindex="5"
                        >Cliquez ici</TextLink
                    >
                </div>
            </Form>
        </div>
    </AuthBase>
</template>
