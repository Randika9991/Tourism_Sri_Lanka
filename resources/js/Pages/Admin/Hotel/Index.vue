<template>
    <Head title="Dashboard" />

    <AdminAuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
                        <template v-if="hotels.data.length > 0">
                            <div v-for="hotel in hotels.data" :key="hotel.id" class="relative group">
                                <a class="block bg-white shadow-md rounded-lg overflow-hidden relative">
                                    <!-- Image -->
                                    <img

                                        :src="hotel.images ? `/storage/${JSON.parse(hotel.images)[0]}` : '/default-image.jpg'"
                                        :alt="hotel.name"
                                        class="w-full h-64 object-cover"
                                    />

                                    <!-- Overlay with Icon & Message -->
                                    <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <p class="text-white font-bold text-lg">View Details</p>
                                    </div>
                                </a>
                                <div class="p-4">
                                    <h2 class="font-bold text-xl">Name: {{ hotel.name }}</h2>
                                    <p v-if="hotel.rating" class="text-gray-600 flex items-center">
                                        Rating:
                                        <span v-for="n in Math.floor(hotel.rating)" :key="n" class="text-yellow-500">★</span>
                                    </p>
                                    <p v-if="hotel.travel_season!==null" class="text-gray-600">Sri Lanka {{hotel.province_name}} {{ hotel.district.name }}.</p>
                                    <p class="text-gray-600">Travel Season: {{ hotel.district.travel_season }}</p>
                                    <div class="flex space-x-4 mt-2">
                                        <a :href="route('hotel.edit', { id: hotel.id })"  class="text-blue-500 font-bold">Edit</a>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-else>
                            <p>No districts available.</p>
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

const props = defineProps({
    hotels: {
        type: Array,
    },
});

console.log(props.hotels);

const addNewHotel = () => {
    Inertia.visit(route('hotel.create'));
};
</script>

