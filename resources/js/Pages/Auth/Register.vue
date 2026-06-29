<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div
            class="w-full max-w-md rounded-2xl border border-white/10 bg-[#0B0F19] p-8 shadow-2xl"
        >
            <!-- HEADER -->
            <h1 class="text-xl font-semibold text-white text-center">
                Create account
            </h1>

            <p class="text-sm text-gray-500 text-center mt-1 mb-6">
                Start building your workspace
            </p>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- NAME -->
                <div>
                    <InputLabel for="name" value="Name" class="text-gray-400" />

                    <TextInput
                        id="name"
                        type="text"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        class="mt-1 block w-full rounded-lg border border-white/10 bg-[#111827] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

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
                        autocomplete="new-password"
                        class="mt-1 block w-full rounded-lg border border-white/10 bg-[#111827] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- CONFIRM PASSWORD -->
                <div>
                    <InputLabel
                        for="password_confirmation"
                        value="Confirm Password"
                        class="text-gray-400"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        class="mt-1 block w-full rounded-lg border border-white/10 bg-[#111827] text-white focus:border-blue-500 focus:ring-1 focus:ring-blue-500"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <!-- ACTIONS -->
                <div class="flex items-center justify-between pt-2">
                    <Link
                        :href="route('login')"
                        class="text-xs text-gray-500 hover:text-white transition"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton
                        :disabled="form.processing"
                        class="rounded-lg bg-blue-600 px-5 py-2 text-white text-sm font-medium hover:bg-blue-500 transition disabled:opacity-50"
                    >
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
