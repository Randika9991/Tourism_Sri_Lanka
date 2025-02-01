<template>
    <Head title="Dashboard" />

    <AdminAuthenticatedLayout>
        <template #header>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <h2
                    class="text-xl font-semibold leading-tight text-gray-800"
                >
                    Hotel Information
                </h2>
                <div class="text-xl font-semibold leading-tight text-gray-800">
                    <button
                        @click="addNewHotel"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400"
                    >
                        Add New
                    </button>
                </div>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        Admin You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>

<script setup>
import AdminAuthenticatedLayout from '@/Layouts/Admin/AdminAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {Inertia} from "@inertiajs/inertia";



const addNewHotel = () => {
    Inertia.visit(route('hotel.create'));
};
</script>

