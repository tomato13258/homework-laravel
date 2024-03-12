<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import bgPic from '/images/test.png';
export default{
    components:{
        AuthenticatedLayout,
    },
    props:{
        response:{
            type:Object,
        },
    },
    data(){
        return{
            bgPic:bgPic,
            

        }
    },
};
</script>
<template>
    <AuthenticatedLayout>
        <img :src="bgPic" alt="">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="pb-[20px]" v-for="book in response.books" :key="book.id">
        <div class="">編號:{{book.id}}</div>
    <div class="">${{response.price}}</div>
    <div class="">書名:{{response.title}}</div>
    </div>
   <div class="" v-for="book in  response.books" :key="book.id">
    <div class="">編號:{{book.id}}</div>
    <div class="">本數:{{response.collect}}</div>
   </div>

    </AuthenticatedLayout>
    
</template>