<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div
            class="w-full max-w-md rounded-2xl border border-white/10 bg-[#0B0F19] p-8 shadow-2xl"
        >
            <!-- Title -->
            <h1 class="text-xl font-semibold text-white text-center">
                Welcome back
            </h1>

            <p class="text-sm text-gray-500 text-center mt-1 mb-6">
                Sign in to your account
            </p>

            <!-- STATUS -->
            <div v-if="status" class="mb-4 text-sm text-green-400">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- EMAIL -->
                <div>
                    <InputLabel
                        for="email"
                        value="Email"
                        class="text-gray-400"
                    />

                    <TextInput
                        id="email"
                        type="email"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                        class="mt-1 block w-full rounded-lg border border-white/10 bg-[#111827] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- PASSWORD -->
                <div>
                    <InputLabel
                        for="password"
                        value="Password"
                        class="text-gray-400"
                    />

                    <TextInput
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                        class="mt-1 block w-full rounded-lg border border-white/10 bg-[#111827] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- REMEMBER -->
                <div class="flex items-center justify-between">
                    <label
                        class="flex items-center gap-2 text-sm text-gray-400"
                    >
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                            class="rounded border-white/20 bg-[#111827]"
                        />
                        Remember me
                    </label>

                    <Link
                        :href="route('register')"
                        class="text-xs text-gray-500 hover:text-white transition"
                    >
                        Don't have an account?
                    </Link>
                </div>

                <!-- BUTTON -->
                <PrimaryButton
                    :disabled="form.processing"
                    class="w-full mt-4 rounded-lg bg-blue-600 py-2.5 text-white font-medium hover:bg-blue-500 transition disabled:opacity-50"
                >
                    Log in
                </PrimaryButton>
            </form>
        </div>
    </GuestLayout>
</template>
