<script setup>
import Menu from "@/Components/LayoutComponents/Menu.vue";
import Footer from "@/Components/LayoutComponents/Footer.vue";
</script>

<template>
    <div class="min-h-screen bg-[#0D1117] text-gray-200">
        <!-- TOP NAV -->
        <Menu />

        <!-- HEADER -->
        <header
            v-if="$slots.header"
            class="border-b border-white/5 bg-[#111827]"
        >
            <div class="mx-auto max-w-6xl px-6 py-8">
                <slot name="header" />
            </div>
        </header>

        <!-- PAGE -->

        <main class="mx-auto max-w-6xl px-6 py-8">
            <slot />
        </main>
    </div>
    <Footer />
</template>
