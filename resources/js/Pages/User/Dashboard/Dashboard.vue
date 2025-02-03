<script setup>
import AuthenticatedLayout from '@/Layouts/User/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Baskervville:ital@0;1&family=Black+Ops+One&display=swap');
</style>

//user dashboard
<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
       
        <div 
            class="min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center" 
            style="background-image: url('/images/dash.jpeg');"
        >
            <div class="w-[1225px] h-[542px]  bg-[#D9D9D9] bg-opacity-15 p-6 rounded-lg shadow-lg flex items-center justify-center text-center  flex-col">
                <p class="text-7xl text-gray-900 text-white " style=" font-family:Black Ops One">TRAVEL TO BEAUTY</p>

                <div class="mt-14">
                    <button class="btn bg-[#6F9283] w-[253px] h-[55px]  text-white rounded-[20px] px-6 py-2  transition duration-300" style="font-family:Baskervville; font-weight: 400; font-size: 18px; font-style: italic;">start your journey</button>
                </div>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
